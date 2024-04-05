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

%>
<?php
/**
 *
 */
use Cake\Core\Configure;

/* @var $this \AdminLTE\View\OverrideView */

$this->extend('form');

$this->assign('subtitle', __('Create new <%= $singularHumanName %>'));
$this->Breadcrumbs->add($this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['escape' => false]));
$this->Breadcrumbs->add(__('<%= Inflector::humanize($action) %> <%= $singularHumanName %>'), null, ['class' => 'active']);
?>
<?php $this->start('box-header'); ?>
<h3 class="box-title"><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h3>
<div class="box-tools pull-right"></div>
<?php $this->end(); ?>

<?php $this->start('side-actions'); ?>
<nav>
  <ul class="nav nav-pills nav-stacked">
    <li><?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
  </ul>
</nav>
<?php $this->end(); ?>
