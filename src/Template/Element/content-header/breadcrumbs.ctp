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
 * breadcrumbs
 *
 * variables:
 * $messages
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

/* @var $this \Cake\View\View  */
echo $this->Html->getCrumbList([
    'class' => 'breadcrumb',
    'lastClass' => 'active',
    'escape' => false,
    ], __('<i class="fa fa-dashboard"></i> Home'));
