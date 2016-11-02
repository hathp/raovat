<?php


namespace Core\Upload;


use Illuminate\Http\Request;
use Image;

class Upload
{
    public function image($request, $name, $path, $callback = null)
    {
        if ($request->hasFile($name)) {
            $image = $request->file($name);

            // Calculate file name
            $sub_path        = '/' . date('Y') . '/' . date('m') . '/';
            $image_extension = $image->guessClientExtension();
            $image_filename  = uniqid('image') . '.' . $image_extension;

            // Check whether the path is exist
            if(realpath(public_path($path))) {
                // Create sub-directory if not exitst
                if( ! realpath($path . $sub_path)) {
                    mkdir($path . $sub_path, 0777, true);
                }
            }
            else {
                return false;
            }

            // Move image
            $full_path = $path . $sub_path;
            $image->move($full_path, $image_filename);

            // Process and save image
            if(is_callable($callback)) {
                $image = Image::make($full_path . $image_filename);
                call_user_func($callback, $image);
                $image->save();
            }

            return $sub_path . $image_filename;
        }
        else {
            return null;
        }
    }

}