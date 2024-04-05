<?php
/**
 * AdminLTE Theme for CakePHP
 *
 * Copyright 2015, ELASTIC Consultants Inc. http://elasticconsultants.com/
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version    1.0
 * @author     nojimage <nojima at elasticconsultants.com>
 * @copyright  2015 ELASTIC Consultants Inc.
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link       http://elasticconsultants.com
 * @since      File available since Release 1.0
 * @modifiedby nojimage <nojima at elasticconsultants.com>
 */

namespace AdminLTE\View;

use Cake\View\View;
use Cake\Core\App;

/**
 * Custom View class
 *
 * @property \BootstrapUI\View\Helper\HtmlHelper $Html
 * @property \BootstrapUI\View\Helper\FormHelper $Form
 * @property \BootstrapUI\View\Helper\FlashHelper $Flash
 * @property \BootstrapUI\View\Helper\BreadcrumbsHelper $Breadcrumbs
 * @property \BootstrapUI\View\Helper\PaginatorHelper $Paginator
 */
class OverrideView extends View
{

    public $layout = 'AdminLTE.default';

    public function initialize()
    {
        $this->loadHelper('Html', ['className' => 'BootstrapUI.Html']);
        $this->loadHelper('Form', [
            'className' => 'BootstrapUI.Form',
            'widgets' => [
                'datetimepicker' => ['AdminLTE.DatetimePicker'],
            ],
        ]);
        $this->loadHelper('Flash', ['className' => 'BootstrapUI.Flash']);
        $this->loadHelper('Breadcrumbs', ['className' => 'BootstrapUI.Breadcrumbs']);
        $this->loadHelper('Paginator', ['className' => 'BootstrapUI.Paginator']);
    }

    /**
     *
     * @param string $plugin
     * @param boolean $cached
     * @return array
     */
    protected function _paths($plugin = null, $cached = true)
    {
        if ($cached === true) {
            if ($plugin === null && !empty($this->_paths)) {
                return $this->_paths;
            }
            if ($plugin !== null && isset($this->_pathsForPlugin[$plugin])) {
                return $this->_pathsForPlugin[$plugin];
            }
        }

        $paths = parent::_paths($plugin, $cached);

        // override view by {app}/src/Template/Theme
        if (!empty($this->theme)) {
            $theme = $this->theme;
            $localThemePaths = array_filter(
                array_map(function ($path) use ($theme) {
                    return $path . 'Theme/' . $theme . '/';
                }, App::path('Template')), function ($path) {
                return is_dir($path);
            });
            $paths = array_merge($localThemePaths, $paths);
        }

        return $this->_paths = $paths;
    }
}
