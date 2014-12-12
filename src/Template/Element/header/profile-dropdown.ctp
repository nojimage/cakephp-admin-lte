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
 * This file load on authorized user.
 *
 * variables:
 * $user Authorized user
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

/* @var $this \Cake\View\View  */
?>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="glyphicon glyphicon-user"></i>
    <span><?= h($user->display_name) ?> <i class="caret"></i></span>
  </a>
  <ul class="dropdown-menu">
    <li>
      <a href="<?= Router::url(['controller' => 'Profile', 'action' => 'edit']); ?>"><i class="fa fa-lg fa-user"></i> <?= __d('AdminLTE', 'Edit Profile') ?></a>
    </li>
    <li class="divider"></li>
    <li>
      <a href="<?= Router::url('/logout'); ?>"><i class="fa fa-lg fa-sign-out"></i> <?= __d('AdminLTE', 'Sign out') ?></a>
    </li>
  </ul>
</li>
