<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image;

class ImageController extends Controller
{
    public function getImageThumbnail($path, $width = null, $height = null, $type = "fit")
    {

        $images_path = config('image.slider_dir');
        $path        = ltrim($path, "/");


        if (is_null($width) && is_null($height)) {

            return url("{$images_path}/" . $path);

        }

        if (File::exists(public_path("{$images_path}/thumbs/" . "{$width}x{$height}/" . $path))) {
            return url("{$images_path}/thumbs/" . "{$width}x{$height}/" . $path);
        }

        
        if (!File::exists(public_path("{$images_path}/" . $path))) {

            return "http://placehold.it/{$width}x{$height}";
        }

        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        $contentType      = mime_content_type("public/{$images_path}/" . $path);

        if (in_array($contentType, $allowedMimeTypes)) { 

            $image = Image::make(public_path("{$images_path}/" . $path));

            switch ($type) {

                case "fit": {
                    $image->fit($width, $height, function ($constraint) {
                        $constraint->upsize();
                    });
                    break;
                }
                case "resize": {
                   
                    $image->resize($width, $height);
                }
                case "background": {

                    $image->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }
                case "resizeCanvas": {

                    $image->resizeCanvas($width, $height, 'center', false, 'rgba(0, 0, 0, 0)'); 

                }
            }


            $dir_path = (dirname($path) == '.') ? "" : dirname($path);

            if (!File::exists(public_path("{$images_path}/thumbs/" . "{$width}x{$height}/" . $dir_path))) {
                File::makeDirectory(public_path("{$images_path}/thumbs/" . "{$width}x{$height}/" . $dir_path), 0775, true);
            }

            $image->save(public_path("{$images_path}/thumbs/" . "{$width}x{$height}/" . $path));

            return url("{$images_path}/thumbs/" . "{$width}x{$height}/" . $path);
        } else {

            return "http://placehold.it/{$width}x{$height}";
        }
    }
}
