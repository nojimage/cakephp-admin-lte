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
<?php

/**
 *
 */
use Cake\Core\Configure;

/* @var $this \AdminLTE\View\OverrideView */
$this->assign('title', __('<%= $pluralHumanName %>'));
?>
<div class="row">
  <section>
    <div class="<%= $pluralVar %> form col-md-8">
      <div class="box box-primary">
        <div class="box-header">
          <?= $this->fetch('box-header'); ?>
        </div><!-- /.box-header -->
        <?= $this->Form->create($<%= $singularVar %>); ?>
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
              echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true, 'label' => ['text' => __('<%= Inflector::humanize($field) %>')]]);
          <%
          } else {
          %>
              echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'label' => ['text' => __('<%= Inflector::humanize($field) %>')]]);
          <%
          }
          continue;
          }
          if (!in_array($field, ['created', 'modified', 'updated', 'created_at', 'modified_at', 'updated_at'])) {
          %>
              echo $this->Form->input('<%= $field %>', ['label' => ['text' => __('<%= Inflector::humanize($field) %>')]]);
          <%
          }
          }
          if (!empty($associations['BelongsToMany'])) {
          foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
          %>
              echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'label' => ['text' => __('<%= Inflector::humanize($assocName) %>')]]);
          <%
          }
          }
          %>

          ?>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
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
          <?= $this->fetch('side-actions'); ?>
        </div>
      </div>
    </div>
  </aside>
</div>
