<?php
/**
 * AdminLTE Theme for CakePHP
 *
 * Copyright 2014, ELASTIC Consultants Inc. http://elasticconsultants.com/
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version    1.0
 * @author     nojimage <nojima at elasticconsultants.com>
 * @copyright  2014 ELASTIC Consultants Inc.
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link       http://elasticconsultants.com
 * @since      File available since Release 1.0
 * @modifiedby nojimage <nojima at elasticconsultants.com>
 */

/**
 * variables:
 * $user Authorized user
 * $messages
 * $notifications
 * $tasks
 */
use Cake\Core\Configure;

/* @var $this \AdminLTE\View\OverrideView */
?>
<header class="main-header">
  <?= $this->Html->link(Configure::read('App.name'), '/', ['class' => 'logo']); ?>
  <?php /* Header Navbar: style can be found in header.less  */ ?>
  <nav class="navbar navbar-static-top" role="navigation">
    <?php /* Sidebar toggle button  */ ?>
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only"><?= __d('AdminLTE', 'Toggle navigation'); ?></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php /* Messages: style can be found in dropdown.less */ ?>
        <?= isset($messages) ? $this->element('header/messages') : ''; ?>
        <?php /* Notifications: style can be found in dropdown.less  */ ?>
        <?= isset($notifications) ? $this->element('header/notifications') : ''; ?>
        <?php /* Tasks: style can be found in dropdown.less  */ ?>
        <?= isset($tasks) ? $this->element('header/tasks') : ''; ?>
        <?php /* User Account: style can be found in dropdown.less  */ ?>
        <?= !empty($user) ? $this->element('header/profile-dropdown') : ''; ?>
      </ul>
    </div>
  </nav>
</header>
