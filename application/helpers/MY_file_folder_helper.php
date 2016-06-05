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

}