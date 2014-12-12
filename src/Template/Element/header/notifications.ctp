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
 * $notifications
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

/* @var $this \Cake\View\View  */
?>
<li class="dropdown notifications-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-warning"></i>
    <span class="label label-warning"><?= count($notifications) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">You have 10 notifications</li>
    <li>
      <?php /* inner menu: contains the actual data  */ ?>
      <ul class="menu">
        <li>
          <a href="#">
            <i class="ion ion-ios7-people info"></i> 5 new members joined today
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-users warning"></i> 5 new members joined
          </a>
        </li>

        <li>
          <a href="#">
            <i class="ion ion-ios7-cart success"></i> 25 sales made
          </a>
        </li>
        <li>
          <a href="#">
            <i class="ion ion-ios7-person danger"></i> You changed your username
          </a>
        </li>
      </ul>
    </li>
    <li class="footer"><a href="#">View all</a></li>
  </ul>
</li>
