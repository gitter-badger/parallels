<?php

namespace AppBundle\Helper;

/**
 * Helper class for dealing with SSH keys.
 */
class SshKeyHelper
{

    public static function generate()
    {
        $tempPath = sys_get_temp_dir() . '/';

        // FastCGI fix for Windows machines, where temp path is not available to
        // PHP, and defaults to the unwritable system directory.  If the temp
        // path is pointing to the system directory, shift to the 'TEMP'
        // sub-folder, which should also exist, but actually be writable.
        if ($tempPath == getenv("SystemRoot") . '/') {
            $tempPath = getenv("SystemRoot") . '/TEMP/';
        }

        $keyFile = $tempPath . md5(microtime(true));

        if (!is_dir($tempPath)) {
            mkdir($tempPath);
        }

        $return = array('private_key' => '', 'public_key' => '');

        $output = @shell_exec('ssh-keygen -t rsa -b 2048 -f ' . $keyFile . ' -N "" -C "deploy@phpci"');

        if (!empty($output)) {
            $pub = file_get_contents($keyFile . '.pub');
            $prv = file_get_contents($keyFile);

            if (!empty($pub)) {
                $return['public_key'] = $pub;
            }

            if (!empty($prv)) {
                $return['private_key'] = $prv;
            }
        }

        return $return;
    }
}
