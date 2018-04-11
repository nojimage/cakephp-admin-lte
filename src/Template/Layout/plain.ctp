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
$skin = $this->exists('skin') ? $this->fetch('skin') : 'skin-blue';
$bodyClass = $this->exists('body-class') ? $this->fetch('body-class') : $skin;
?>
<!DOCTYPE html>
<html>
  <head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?=
    $this->Html->css([
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        './AdminLTE.min',
        './skins/' . $skin . '.min.css',
    ]);
    ?>
    <!--[if lt IE 9]>
    <?=
    $this->Html->script([
        'https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js',
        'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js',
    ]);
    ?>
    <![endif]-->
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  </head>
  <body class="<?= $bodyClass ?>">
    <?php $this->assign('body', $this->fetch('content')); ?>
    <?= $this->fetch('body'); ?>
    <?=
    $this->Html->script([
        '//code.jquery.com/jquery-1.11.3.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        'app.min.js'
    ]);
    ?>
    <?= $this->fetch('script') ?>
  </body>
</html>
