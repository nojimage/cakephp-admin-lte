<?php
$class = 'callout callout-info alert-dismissable';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="<?= h($class) ?>">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <?= h($message) ?>
</div>
