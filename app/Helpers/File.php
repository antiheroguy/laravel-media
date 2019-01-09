<?php

namespace App\Helpers;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class File
{
    public static function upload(UploadedFile $file, $folder = '', $name = null) {
        $destination = public_path() . '/upload/' . $folder;
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
            copy(public_path() . '/upload/index.html', $destination . '/index.html');
            copy(public_path() . '/upload/.gitignore', $destination . '/.gitignore');
        }
        $extension = $file->getClientOriginalExtension();
        if (!$name) {
            $name = str_slug(explode('.', $file->getClientOriginalName())[0]);
        }
        $newName = $name;
        $newFile = $name . '.' . $extension;
        $count = 0;
        while (file_exists($destination . '/' . $newFile)) {
            $count++;
            $newName = $name . '-' . $count;
            $newFile = $newName . '.' . $extension;
        }
        if($file->move($destination, $newFile)) {
            return $newFile;
        };
        return null;
    }

    public static function thumbnail($source_path, $thumbnail_path, $thumbnail_with = 160, $thumbnail_height = 160) {
        list($source_width, $source_height, $source_type) = getimagesize($source_path);
        switch ($source_type) {
            case IMAGETYPE_GIF :
                $source_gd = @imagecreatefromgif($source_path);
                break;
            case IMAGETYPE_JPEG :
                $source_gd = @imagecreatefromjpeg($source_path);
                break;
            case IMAGETYPE_PNG :
                $source_gd = @imagecreatefrompng($source_path);
                break;
        }
        if (!isset($source_gd) || $source_gd === false) {
            return false;
        }
        $source_aspect_ratio = $source_width / $source_height;
        $thumbnail_aspect_ratio = $thumbnail_with / $thumbnail_height;
        if ($source_width <= $thumbnail_with && $source_height <= $thumbnail_height) {
            $thumbnail_width = $source_width;
            $thumbnail_height = $source_height;
        } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
            $thumbnail_width = (int)($thumbnail_with * $source_aspect_ratio);
            $thumbnail_height = $thumbnail_height;
        } else {
            $thumbnail_width = $thumbnail_with;
            $thumbnail_height = (int)($thumbnail_height / $source_aspect_ratio);
        }
        $thumbnail_gd = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
        switch ($source_type) {
            case IMAGETYPE_GIF :
                imagecopyresampled($thumbnail_gd, $source_gd, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $source_width, $source_height);
                $background = imagecolorallocate($thumbnail_gd, 0, 0, 0);
                imagecolortransparent($thumbnail_gd, $background);
                @imagegif($thumbnail_gd, $thumbnail_path);
                break;
            case IMAGETYPE_JPEG :
                imagecopyresampled($thumbnail_gd, $source_gd, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $source_width, $source_height);
                @imagejpeg($thumbnail_gd, $thumbnail_path, 90);
                break;
            case IMAGETYPE_PNG :
                imagealphablending($thumbnail_gd, FALSE);
                imagesavealpha($thumbnail_gd, TRUE);
                imagecopyresampled($thumbnail_gd, $source_gd, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $source_width, $source_height);
                @imagepng($thumbnail_gd, $thumbnail_path);
                break;
        }
        imagedestroy($source_gd);
        imagedestroy($thumbnail_gd);
        return true;
    }

}