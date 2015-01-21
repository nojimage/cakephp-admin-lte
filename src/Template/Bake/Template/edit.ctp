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

/* @var $this \Cake\View\View */
$this->assign('title', __('<%= $pluralHumanName %>'));
$this->assign('subtitle', __('Edit <%= $singularHumanName %>'));
$this->Html->addCrumb($this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['escape' => false]));
$this->Html->addCrumb(__('<%= Inflector::humanize($action) %> <%= $singularHumanName %>'));

$formOptions = Configure::read('AdminLTE.formOptions');
?>
<%
echo $this->element('form');
