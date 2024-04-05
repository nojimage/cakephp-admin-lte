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
/* @var $this \AdminLTE\View\OverrideView */
?>
<section class="content-header">
  <h1>
    <?= $this->fetch('title'); ?>
    <?= ($this->exists('subtitle')) ? $this->Html->tag('small', $this->fetch('subtitle'), ['escape' => false]) : '' ?>
  </h1>
  <?= $this->element('content-header/breadcrumbs'); ?>
</section>
