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

namespace AdminLTE\Console;

use Composer\Script\Event;
use AdminLTE\Shell\CopyAssetsShell;
use Exception;

/**
 * Provides installation hooks for when this application is installed via composer.
 */
class Installer
{

    /**
     * Does some routine installation tasks so people don't have to.
     *
     * @param \Composer\Script\Event $event The composer event object.
     * @throws \Exception Exception raised by validator.
     * @return void
     */
    public static function postInstall(Event $event)
    {
        $io = $event->getIO();
        /* @var $io \Composer\IO\IOInterface */
        $pluginRoot = dirname(dirname(__DIR__));
        $appRoot = dirname(dirname($pluginRoot));
        $webroot = $appRoot . '/webroot';

        // failback for Cake constants
        if (!defined('TMP')) {
            define('TMP', __DIR__);
        }
        if (!defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }

        // ask if the permissions should be changed
        if ($io->isInteractive()) {
            if (!is_dir($webroot)) {
                $webroot = static::askWebroot($io);
            }

            $validator = (function ($arg) {
                if (in_array($arg, ['Y', 'y', 'N', 'n'])) {
                    return $arg;
                }
                throw new Exception('This is not a valid answer. Please choose Y or n.');
            });
            $isCopyToWebroot = $io->askAndValidate('<info>Copy AdminLTE\'s assets to webroot ? (Default to Y)</info> [<comment>Y,n</comment>]? ', $validator, false, 'Y');

            if (in_array($isCopyToWebroot, ['Y', 'y'])) {
                CopyAssetsShell::copyToWebroot($webroot, $pluginRoot . '/bower_components/admin-lte', $io);
            }
        }
    }

    protected static function askWebroot($io)
    {
        $validator = (function ($arg) {
            if (is_dir($arg)) {
                return $arg;
            }
            throw new Exception('This is not a valid answer. Please correct webroot path.');
        });
        return $io->askAndValidate('<info>Input your webroot path.</info> ? ', $validator);
    }

}
