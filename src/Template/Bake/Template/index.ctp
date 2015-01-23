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

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $field !== 'password' && !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
%>
<?php

/**
 * List <%= $pluralVar %>
 */
use Cake\Core\Configure;

/* @var $this \Cake\View\View */
$this->assign('title', __('<%= $pluralHumanName %>'));
$this->assign('subtitle', __('List <%= $pluralHumanName %>'));
$this->Html->addCrumb(__('List <%= $pluralHumanName %>'));

$formOptions = Configure::read('AdminLTE.formOptions');
$searchFormOptions = Configure::read('AdminLTE.searchFormOptions');
$limits = [10, 25, 50, 100];
?>

<div class="row">
  <section>
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"><?= __('<%= $pluralHumanName %>') ?></h3>
          <div class="box-tools actions pull-right">
            <?= $this->Html->link(__('<i class="fa fa-plus"></i> New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary', 'escape' => false]) ?>
          </div>
        </div>
        <div class="box-body">
          <?= $this->Form->create(null, $searchFormOptions); ?>
          <div class="row">
            <div class="col-sm-6">
              <?=
              $this->Form->input('query', [
                  'class' => 'form-control pull-right',
                  'style' => 'width: 150px;',
                  'placeholder' => __('Search')
              ]);
              ?>
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right">
                <?=
                sprintf(__('%s records per page'), $this->Form->select('limit', array_combine($limits, $limits), [
                        'class' => 'form-control',
                        'espace' => false,
                        'onchange' => '$(this).parents("form").submit();'
                ]));
                ?>
              </div>
            </div>
          </div>
          <?= $this->Form->end(); ?>

          <table cellpadding="0" cellspacing="0" class="<%= $pluralVar %> table table-hover table-responsive">
            <thead>
              <tr>
                <% foreach ($fields as $field): %>
                <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
                <% endforeach; %>
                <th class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
              <tr>
<%        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
%>
                <td>
                    <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
                </td>
<%
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
                <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                } else {
%>
                <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], [
                        'class' => 'btn btn-sm btn-danger',
                        'confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)
                    ])
                    ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="counter pull-left">
            <?= $this->Paginator->counter(['format' => __('{{start}} - {{end}} of {{count}}')]) ?>
          </div>
          <ul class="pagination pagination-sm no-margin pull-right">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<% if (!empty($associations)) : %>
  <aside>
    <div class="actions col-md-12">
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title"><?= __('Related Actions') ?></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <nav>
          <ul class="nav nav-pills nav-justified">
<%
    $done = [];
    foreach ($associations as $type => $data):
        foreach ($data as $alias => $details):
            if ($details['controller'] != $this->name && !in_array($details['controller'], $done)):
%>
            <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?> </li>
<%
                $done[] = $details['controller'];
            endif;
        endforeach;
    endforeach;
%>
          </ul>
          </nav>
        </div>
      </div>
    </div>
  </aside>
<% endif; %>
</div>
