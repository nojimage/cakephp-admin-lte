<?php

use Cake\Core\Configure;
use Cake\Core\Plugin;

if (!Plugin::loaded('BootstrapUI')) {
    Plugin::load('BootstrapUI');
}

Configure::write('AdminLTE.iCheckFormOptions', [
    'templates' => [
        'inputContainer' => '<div class="form-group icheck {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group icheck {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    ],
]);

Configure::write('AdminLTE.searchFormOptions', [
    'align' => 'inline',
    'type' => 'get',
    'class' => 'inline-search-form'
]);

Configure::write('AdminLTE.formHorizontalOptions', [
    'align' => [
        'sm' => [
            'left' => 3,
            'middle' => 9,
            'right' => 12,
        ],
    ],
]);
