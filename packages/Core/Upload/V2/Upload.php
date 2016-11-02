<?php


namespace Core\Upload\V2;

use Image;

class Upload
{
    protected $upload_filename;

    public function image($file, $path, $config = null)
    {
        if (is_file($file)) {
            $image = $file;

            // Calculate file name
            $sub_path = '/' . date('Y') . '/' . date('m') . '/';
            $image_extension = '.' . $image->guessClientExtension();
            $image_filename = empty($this->upload_filename) ? (uniqid('image') . $image_extension) : ($this->upload_filename . $image_extension);

            // Check whether the path is exist
            if (!realpath(public_path($path . $sub_path))) {
                mkdir($path . $sub_path, 0777, true);
            }

            // make new image instance
            $image = Image::make($file);

            // Populate the image with given config
            if( ! empty($config)) {
                foreach($config as $method => $value) {
                    if(is_array($value)) {
                        $arguments = $value;
                    }
                    else {
                        $arguments[] = $value;
                    }
                    call_user_func_array([$image, $method], $arguments);
                }
            }

            // Save the image
            $image->save($path . $sub_path . $image_filename);

            // return path
            return $sub_path . $image_filename;
        }

        return null;
    }

    public function images($files, $configs)
    {
        if(empty($files)) {
            return null;
        }

        // Check where $file is array of file
        if(is_array($files)) {
            // name of file that uploaded
            $stored_files = [];

            foreach($files as $file) {

                // We use same name for each file size
                $this->upload_filename = uniqid('image');
                // loop thought config to save image in different size
                foreach($configs as $type => $image_config) {
                    $path = $image_config['path']; // Get the path from config
                    $config = $image_config['config']; // Get the image config

                    // Upload the file
                    $image_path = $this->image($file, $path , $config);
                }
                if(isset($image_path)) {
                    // insert uploaded filename to return
                    $stored_files[] = $image_path;
                }

            }

            // unset upload_filename to prepare next upload
            unset($this->upload_filename);

            return $stored_files;
        }
        else {
            // if $files is not array, we just upload it
            $this->upload_filename = uniqid('image');

            // loop through the config file
            foreach($configs as $type => $image_config) {
                $path = $image_config['path']; // get path
                $config = empty($image_config['config']) ? null : $image_config['config']; // get config for image

                // save the path
                $image_path = $this->image($files, $path, $config);
            }

            // again, unset for latter use
            unset($this->upload_filename);

            return isset($image_path) ? $image_path : false;
        }
    }
}