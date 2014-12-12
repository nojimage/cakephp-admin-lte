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

use Cake\Console\Shell;
use Cake\Filesystem\Folder;
use Cake\Console\ConsoleIo;
use Composer\IO\IOInterface;
use Exception;

/**
 * CopyAssetsShell
 */
class CopyAssetsShell extends Shell
{

    public function main()
    {
        $pluginRoot = dirname(dirname(__DIR__));
        $isCopyToWebroot = $this->in('Copy AdminLTE\'s assets to webroot ?', ['Y', 'n'], 'Y');
        if (in_array($isCopyToWebroot, ['Y', 'y'])) {
            static::copyToWebroot(WWW_ROOT, $pluginRoot . '/bower_components/admin-lte', $this->io());
        }
    }

    /**
     * Copy assets to webroot
     *
     * @param string $webrootDir
     * @param string $assetsDir
     * @param mixed $io
     */
    public static function copyToWebroot($webrootDir, $assetsDir, $io)
    {
        static::checkWebroot($webrootDir);
        $folder = new Folder();
        foreach (['css', 'fonts', 'img', 'js', 'less'] as $subdir) {
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

}
