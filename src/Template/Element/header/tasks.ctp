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
 * $tasks
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

/* @var $this \Cake\View\View  */
?>
<li class="dropdown tasks-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-tasks"></i>
    <span class="label label-danger"><?= count($tasks) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">You have 9 tasks</li>
    <li>
      <?php /* inner menu: contains the actual data  */ ?>
      <ul class="menu">
        <li><?php /* Task item  */ ?>
          <a href="#">
            <h3>
              Design some buttons
              <small class="pull-right">20%</small>
            </h3>
            <div class="progress xs">
              <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">20% Complete</span>
              </div>
            </div>
          </a>
        </li><?php /* end task item  */ ?>
        <li><?php /* Task item  */ ?>
          <a href="#">
            <h3>
              Create a nice theme
              <small class="pull-right">40%</small>
            </h3>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">40% Complete</span>
              </div>
            </div>
          </a>
        </li><?php /* end task item  */ ?>
        <li><?php /* Task item  */ ?>
          <a href="#">
            <h3>
              Some task I need to do
              <small class="pull-right">60%</small>
            </h3>
            <div class="progress xs">
              <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </a>
        </li><?php /* end task item  */ ?>
        <li><?php /* Task item  */ ?>
          <a href="#">
            <h3>
              Make beautiful transitions
              <small class="pull-right">80%</small>
            </h3>
            <div class="progress xs">
              <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">80% Complete</span>
              </div>
            </div>
          </a>
        </li><?php /* end task item  */ ?>
      </ul>
    </li>
    <li class="footer">
      <a href="#">View all tasks</a>
    </li>
  </ul>
</li>
