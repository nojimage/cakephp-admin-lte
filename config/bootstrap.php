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
