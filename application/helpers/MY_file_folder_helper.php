<?php

class MY_file_folder_helper
{

    public static function delete_dir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::delete_dir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    function chmod_r($dir, $dirPermissions, $filePermissions) {
        $dp = opendir($dir);
        while($file = readdir($dp)) {
            if (($file == ".") || ($file == ".."))
                continue;

            $fullPath = $dir."/".$file;

            if(is_dir($fullPath)) {
                echo('DIR:' . $fullPath . "\n");
                chmod($fullPath, $dirPermissions);
                $this->chmod_r($fullPath, $dirPermissions, $filePermissions);
            } else {
                echo('FILE:' . $fullPath . "\n");
                chmod($fullPath, $filePermissions);
            }

        }
        closedir($dp);
    }

}