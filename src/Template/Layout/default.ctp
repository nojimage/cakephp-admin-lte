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
/* @var $this \Cake\View\View  */
$this->extend('/Layout/plain');
?>
<?php
if (!$this->exists('header') && $this->elementExists('header')) {
    $this->append('header', $this->element('header'));
}
echo $this->fetch('header');
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <?php
  if (!$this->exists('sidebar') && $this->elementExists('sidebar')) {
      $this->append('sidebar', $this->element('sidebar'));
  }
  echo $this->fetch('sidebar');
  ?>

  <aside class="content-wrapper">
    <?php
    if (!$this->exists('content-header') && $this->elementExists('content-header')) {
        $this->append('content-header', $this->element('content-header'));
    }
    echo $this->fetch('content-header');
    ?>

    <!-- Main content -->
    <section class="content">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </section><!-- /.content -->
  </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
