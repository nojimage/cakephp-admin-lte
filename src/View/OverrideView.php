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

namespace AdminLTE\View;

use Cake\View\View;
use Cake\Core\App;

/**
 * Custom View class
 */
class OverrideView extends View
{

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
