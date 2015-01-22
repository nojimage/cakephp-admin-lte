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
return $schema->columnType($field) !== 'binary';
});
%>
<div class="row">
  <section>
    <div class="<%= $pluralVar %> form col-md-8">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h3>
          <div class="box-tools pull-right">
          <% if (strpos($action, 'add') === false): %>
            <?=
            $this->Form->postLink(
            __('<i class="fa fa-trash-o"></i> Delete'),
            ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
            [
                'class' => 'btn btn-sm btn-danger',
                'escape' => false,
                'confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)
            ]
            )
            ?>
          <% endif; %>
          </div>
        </div><!-- /.box-header -->
        <?= $this->Form->create($<%= $singularVar %>, $formOptions); ?>
        <div class="box-body">
          <?php
          <%
          foreach ($fields as $field) {
          if (in_array($field, $primaryKey)) {
              continue;
          }
          if (isset($keyFields[$field])) {
          $fieldData = $schema->column($field);
          if (!empty($fieldData['null'])) {
          %>
              echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true, 'class' => 'form-control', 'label' => ['class' => 'control-label']]);
          <%
          } else {
          %>
              echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'class' => 'form-control', 'label' => ['class' => 'control-label']]);
          <%
          }
          continue;
          }
          if (!in_array($field, ['created', 'modified', 'updated', 'created_at', 'modified_at', 'updated_at'])) {
          %>
              echo $this->Form->input('<%= $field %>', ['class' => 'form-control', 'label' => ['class' => 'control-label']]);
          <%
          }
          }
          if (!empty($associations['BelongsToMany'])) {
          foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
          %>
              echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'class' => 'form-control', 'label' => ['class' => 'control-label']]);
          <%
          }
          }
          %>

          ?>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
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
          <%
          $done = [];
          foreach ($associations as $type => $data) {
          foreach ($data as $alias => $details) {
          if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
          %>
            <li><?=
                $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) %> </li>
            <li><? = $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) %> </li>
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
