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

namespace AdminLTE\Shell;

use Cake\Console\ConsoleInput;
use Cake\Console\Shell;
use Cake\Filesystem\Folder;
use Exception;
use InvalidArgumentException;
use const WWW_ROOT;

/**
 * CopyAssetsShell
 */
class CopyAssetsShell extends Shell
{

    public function main()
    {
        static::copyAdminLTEAssetsToWebroot($this);
        static::copyBootstrapAssetsToWebroot($this);
        static::copyPluginsAssetsToWebroot($this);
        static::copyBuildAssetsToWebroot($this);
    }

    /**
     * Copy AdminLTE assets to webroot
     *
     * @param ConsoleInput $io
     * @param string $webroot
     */
    public static function copyAdminLTEAssetsToWebroot($io, $webroot = WWW_ROOT)
    {
        $pluginRoot = dirname(dirname(__DIR__));
        $assetsDir = $pluginRoot . '/bower_components/AdminLTE/dist';
        $confirm = static::ioAsk($io, 'Copy AdminLTE assets to webroot ?');

        if (in_array($confirm, ['Y', 'y'])) {
            static::copyToWebroot($webroot, $assetsDir, $io);
        }
    }

    /**
     * Copy Bootstrap assets to webroot
     *
     * @param ConsoleInput $io
     * @param string $webroot
     */
    public static function copyBootstrapAssetsToWebroot($io, $webroot = WWW_ROOT)
    {
        $pluginRoot = dirname(dirname(__DIR__));
        $assetsDir = $pluginRoot . '/bower_components/AdminLTE/bootstrap';
        $confirm = static::ioAsk($io, 'Copy Bootstrap assets to webroot ?');

        if (in_array($confirm, ['Y', 'y'])) {
            static::copyToWebroot($webroot, $assetsDir, $io);
        }
    }

    /**
     * Copy plugins assets to webroot
     *
     * @param ConsoleInput $io
     * @param string $webroot
     */
    public static function copyPluginsAssetsToWebroot($io, $webroot = WWW_ROOT)
    {
        $pluginRoot = dirname(dirname(__DIR__));
        $assetsDir = $pluginRoot . '/bower_components/AdminLTE';
        $confirm = static::ioAsk($io, 'Copy AdminLTE plugin assets to webroot ?');

        if (in_array($confirm, ['Y', 'y'])) {
            static::copyToWebroot($webroot, $assetsDir, $io, ['plugins']);
        }
    }

    /**
     * Copy build assets to webroot
     *
     * @param ConsoleInput $io
     * @param string $webroot
     */
    public static function copyBuildAssetsToWebroot($io, $webroot = WWW_ROOT)
    {
        $pluginRoot = dirname(dirname(__DIR__));
        $assetsDir = $pluginRoot . '/bower_components/AdminLTE';
        $confirm = static::ioAsk($io, 'Copy AdminLTE build assets (less files) to webroot ?');

        if (in_array($confirm, ['Y', 'y'])) {
            static::copyToWebroot($webroot, $assetsDir, $io, ['build']);
        }
    }

    /**
     * Copy assets to webroot
     *
     * @param string $webrootDir
     * @param string $assetsDir
     * @param mixed $io
     * @param array $subDirectories
     */
    protected static function copyToWebroot($webrootDir, $assetsDir, $io, $subDirectories = ['css', 'img', 'js', 'fonts'])
    {
        static::checkWebroot($webrootDir);
        $folder = new Folder();
        foreach ($subDirectories as $subdir) {
            $success = $folder->copy([
                'from' => $assetsDir . '/' . $subdir,
                'to' => $webrootDir . '/' . $subdir,
                'skip' => ['.DS_Store'],
                'scheme' => Folder::MERGE,
            ]);
            if ($success) {
                static::ioWrite($io, "Copy `$subdir` files: success");
            } else {
                static::ioWrite($io, "Copy `$subdir` files: failure");
            }
        }
    }

    /**
     *
     * @param string $webrootDir
     * @throws Exception
     */
    protected static function checkWebroot($webrootDir)
    {
        if (!is_dir($webrootDir)) {
            throw new Exception(sprintf('Not found webroot directory. "%s"', $webrootDir));
        }
    }

    /**
     *
     * @param object $io
     * @param string $message
     */
    protected static function ioWrite($io, $message)
    {
        if (method_exists($io, 'write')) {
            $io->write($message);
        } elseif (method_exists($io, 'out')) {
            $io->out($message);
        }
    }

    /**
     *
     * @param object $io
     * @param string $message
     * @return mixed
     */
    protected static function ioAsk($io, $message)
    {
        if (method_exists($io, 'in')) {
            return $io->in($message, ['Y', 'n'], 'Y');
        } elseif (method_exists($io, 'askAndValidate')) {
            $message = sprintf('<info>%s (Default to Y)</info> [<comment>Y,n</comment>]? ', $message);
            return $io->askAndValidate($message, static::getYesNoValidator(), false, 'Y');
        }
        return false;
    }

    /**
     *
     * @return callable
     */
    protected static function getYesNoValidator()
    {
        return (function ($arg) {
            if (in_array($arg, ['Y', 'y', 'N', 'n'])) {
                return $arg;
            }
            throw new InvalidArgumentException('This is not a valid answer. Please choose Y or n.');
        });
    }

}
