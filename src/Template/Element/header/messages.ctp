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
 * $messages
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

/* @var $this \Cake\View\View  */
?>
<li class="dropdown messages-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope"></i>
    <span class="label label-success"><?= count($messages) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">You have 4 messages</li>
    <li>
      <?php /* inner menu: contains the actual data  */ ?>
      <ul class="menu">
        <li><?php /* start message  */ ?>
          <a href="#">
            <div class="pull-left">
              <img src="../../img/avatar3.png" class="img-circle" alt="User Image"/>
            </div>
            <h4>
              Support Team
              <small><i class="fa fa-clock-o"></i> 5 mins</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li><?php /* end message  */ ?>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="../../img/avatar2.png" class="img-circle" alt="user image"/>
            </div>
            <h4>
              AdminLTE Design Team
              <small><i class="fa fa-clock-o"></i> 2 hours</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="../../img/avatar.png" class="img-circle" alt="user image"/>
            </div>
            <h4>
              Developers
              <small><i class="fa fa-clock-o"></i> Today</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="../../img/avatar2.png" class="img-circle" alt="user image"/>
            </div>
            <h4>
              Sales Department
              <small><i class="fa fa-clock-o"></i> Yesterday</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="../../img/avatar.png" class="img-circle" alt="user image"/>
            </div>
            <h4>
              Reviewers
              <small><i class="fa fa-clock-o"></i> 2 days</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="footer"><a href="#">See All Messages</a></li>
  </ul>
</li>
