<%
/**
 * AdminLTE Theme for CakePHP
 *
 * Copyright 2015, ELASTIC Consultants Inc. http://elasticconsultants.com/
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version    1.0
 * @author     nojimage <nojima at elasticconsultants.com>
 * @copyright  2015 ELASTIC Consultants Inc.
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link       http://elasticconsultants.com
 * @since      File available since Release 1.0
 * @modifiedby nojimage <nojima at elasticconsultants.com>
 */
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields, $primaryKey) {
        $type = $schema->columnType($field);
        if (in_array($field, $primaryKey)) {
            return 'primary';
        }
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['primary' => [], 'number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<?php
/**
 * View <%= $singularHumanName %>
 */
/* @var $this \Cake\View\View */
$this->assign('title', __('<%= $pluralHumanName %>'));
$this->assign('subtitle', __('Detail of <%= $singularHumanName %>'));
$this->Html->addCrumb($this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['escape' => false]));
$this->Html->addCrumb(__('View <%= $singularHumanName %>'));
?>
<div class="row">
  <section>
    <div class="<%= $pluralVar %> view col-md-8">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h3>
          <div class="box-tools pull-right">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-sm btn-primary']) ?>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">

<% if ($groupedFields['primary']) : %>
          <dl class="dl-horizontal primary">
<% foreach ($groupedFields['primary'] as $field) : %>
            <dt><?= __('<%= Inflector::humanize($field) %>') ?></dt>
            <dd><?= h($<%= $singularVar %>-><%= $field %>) ?></dd>
<% endforeach; %>
          </dl>
<% endif; %>

<% if ($groupedFields['string']) : %>
          <dl class="dl-horizontal strings">
<% foreach ($groupedFields['string'] as $field) : %>
<% if (isset($associationFields[$field])) :
            $details = $associationFields[$field];
%>
            <dt><?= __('<%= Inflector::humanize($details['property']) %>') ?></dt>
            <dd><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></dd>
<% else : %>
            <dt><?= __('<%= Inflector::humanize($field) %>') ?></dt>
            <% if ($field === 'password') : %>
            <dd><?= str_repeat('*', strlen($<%= $singularVar %>-><%= $field %>)) ?></dd>
            <% else: %>
            <dd><?= h($<%= $singularVar %>-><%= $field %>) ?></dd>
            <% endif; %>
<% endif; %>
<% endforeach; %>
          </dl>
<% endif; %>

<% if ($groupedFields['number']) : %>
          <dl class="dl-horizontal numbers">
<% foreach ($groupedFields['number'] as $field) : %>
            <dt><?= __('<%= Inflector::humanize($field) %>') ?></dt>
            <dd><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></dd>
<% endforeach; %>
          </dl>
<% endif; %>

<% if ($groupedFields['date']) : %>
          <dl class="dl-horizontal dates">
<% foreach ($groupedFields['date'] as $field) : %>
            <dt><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></dt>
            <dd><?= h($<%= $singularVar %>-><%= $field %>) ?></dd>
<% endforeach; %>
          </dl>
<% endif; %>

<% if ($groupedFields['boolean']) : %>
        <dl class="dl-horizontal booleans">
<% foreach ($groupedFields['boolean'] as $field) : %>
            <dt><?= __('<%= Inflector::humanize($field) %>') ?></h6>
            <dd><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></dd>
<% endforeach; %>
        </dl>
<% endif; %>

<% if ($groupedFields['text']) : %>
<% foreach ($groupedFields['text'] as $field) : %>
        <div class="texts">
          <dl>
            <dt><?= __('<%= Inflector::humanize($field) %>') ?></dt>
            <dd><?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?></dd>
          </dl>
        </div>
<% endforeach; %>
<% endif; %>
      </div><!-- /.box-body -->
    </div>
<%
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    %>
    <div class="related box">
      <div class="box-header">
        <h3 class="box-title"><?= __('Related <%= $otherPluralHumanName %>') ?></h3>
        <div class="box-tools pull-right">
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
        <table cellpadding="0" cellspacing="0" class="<%= $singularVar %> table table-hover table-responsive">
          <tr>
<% foreach ($details['fields'] as $field): %>
            <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
<% endforeach; %>
            <th class="actions"><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
          <tr>
            <%- foreach ($details['fields'] as $field): %>
            <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
            <%- endforeach; %>

            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) %>
                <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) %>
                <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) %>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        <?php endif; ?>
      </div><!-- /.box-body -->
    </div><!-- /.related.box -->
<% endforeach; %>

    </div>
  </section>
  <aside>
    <div class="actions col-md-4">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title"><?= __('Actions') ?></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <nav>
            <ul class="nav nav-pills nav-stacked">
              <li><?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add']) ?> </li>
<%
    $done = [];
    foreach ($associations as $type => $data) {
        foreach ($data as $alias => $details) {
            if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
%>
              <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?> </li>
              <li><?= $this->Html->link(__('New <%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?> </li>
<%
                $done[] = $details['controller'];
            }
        }
    }
%>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </aside>
</div>
