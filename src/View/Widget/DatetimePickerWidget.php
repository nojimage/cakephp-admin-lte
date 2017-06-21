<?php

namespace AdminLTE\View\Widget;

use BootstrapUI\View\Widget\BasicWidget;
use Cake\View\Form\ContextInterface;
use Cake\View\Widget\WidgetInterface;

/**
 * type=datetimepicker
 */
class DatetimePickerWidget extends BasicWidget implements WidgetInterface
{

    /**
     * {@inhritdoc}
     */
    public function render(array $data, ContextInterface $context): string
    {
        $data += [
            'name' => '',
            'val' => null,
            'type' => 'text',
            'escape' => true,
            'templateVars' => [],
            'class' => null,
            'prepend' => null,
        ];
        $data['value'] = $data['val'];
        unset($data['val']);

        $data['type'] = 'text';
        if (is_null($data['class'])) {
            $data['class'] = 'form-control datetimepicker';
        }
        if (is_null($data['prepend'])) {
            $data['prepend'] = '<i class="fa fa-calendar"></i>';
        }

        return $this->_withInputGroup($data, $context);
    }
}
