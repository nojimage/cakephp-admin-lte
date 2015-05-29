<?php

use Cake\Core\Configure;

Configure::write('AdminLTE.formOptions', [
    'templates' => [
        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}> ',
        'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}> ',
        'error' => '<p class="help-block error-message text-red">{{content}}</p>',
        'formGroup' => '{{label}}<div>{{input}}</div>',
        'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}>',
        'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    ],
]);

Configure::write('AdminLTE.iCheckFormOptions', [
    'templates' => [
        'inputContainer' => '<div class="form-group icheck {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group icheck {{type}}{{required}} has-error">{{content}}{{error}}</div>',
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

Configure::write('AdminLTE.formHorizontalOptions', [
    'class' => 'form-horizontal',
    'templates' => [
        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}> ',
        'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}> ',
        'error' => '<p class="help-block error-message text-red">{{content}}</p>',
        'formGroup' => '{{label}}<div class="col-sm-9">{{input}}</div>',
        'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}>',
        'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    ],
]);
