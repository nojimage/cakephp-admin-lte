<?php

use Cake\Core\Configure;

Configure::write('AdminLTE.formOptions', [
    'templates' => [
        'error' => '<p class="help-block error-message text-red">{{content}}</p>',
        'formGroup' => '{{label}}<div>{{input}}</div>',
        'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}>',
        'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    ],
]);
Configure::write('AdminLTE.searchFormOptions', [
    'class' => 'form-inline',
    'type' => 'get',
    'templates' => [
        'error' => '<span class="help-block error-message text-red">{{content}}</span>',
        'formGroup' => '{{label}}{{input}}',
        'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}>',
        'inputContainer' => '<div class="input-group input-group-sm {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="input-group input-group-sm {{type}}{{required}} has-error">{{content}}{{error}}</div>',
        'label' => '<span class="input-group-btn pull-left"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>',
    ]
]);
