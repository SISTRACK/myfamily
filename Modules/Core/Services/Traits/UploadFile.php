<?php
namespace Modules\Core\Services\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile

{

    public function resizeImageByResolution($file, $extension, $max_resolution)
    {
   	    	//image to resize
   	    	switch ($extension) {
   	    		case 'jpg':
   	    			$original_image = imagecreatefromjpeg($file);
   	    			break;
   	    		case 'png':
   	    			$original_image = imagecreatefrompng($file);
   	    			break;
   	    		case 'gif':
   	    			$original_image = imagecreatefromgif($file);
   	    			break;
   	    		
   	    		default:
   	    			# code...
   	    			break;
   	    	}
           
            //image resolution
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);
            
            //set the new resolution 
            $ratio = $max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;
     
            if($new_height > $max_resolution){
            	$ratio = $max_resolution / $original_height;
            	$new_height = $max_resolution;
            	$new_width = $original_width * $ratio;
            }
            
            if($original_image){

            	$new_image = imagecreatetruecolor($new_width, $new_height);
            	imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
            	switch ($extension) {
   	    		case 'jpeg':
   	    			imagejpeg($new_image);
   	    			break;
   	    		case 'png':
   	    			imagepng($new_image);
   	    			break;
   	    		case 'gif':
   	    			imagegif($new_image);
   	    			break;
   	    		
   	    		default:
   	    			# code...
   	    			break;
   	    		}
   	    	}
   	    
    }
    public function resizeImageByWidthAndHeight($file, $extension, $width, $height)
    {
   	    	//image to resize
   	    	switch ($extension) {
   	    		case 'jpg':
   	    			$original_image = imagecreatefromjpeg($file);
   	    			break;
   	    		case 'png':
   	    			$original_image = imagecreatefrompng($file);
   	    			break;
   	    		case 'gif':
   	    			$original_image = imagecreatefromgif($file);
   	    			break;
   	    		
   	    		default:
   	    			# code...
   	    			break;
   	    	}
           
            //image resolution
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);
            
            //set the new resolution 
            if($original_image){
            	$new_image = imagecreatetruecolor($width, $height);
            	imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $width, $height, $original_width, $original_height);
            	switch ($extension) {
   	    		case 'jpg':
   	    			imagejpeg($new_image);
   	    			break;
   	    		case 'png':
   	    			imagepng($new_image);
   	    			break;
   	    		case 'gif':
   	    			imagegif($new_image);
   	    			break;
   	    		
   	    		default:
   	    			# code...
   	    			break;
   	    		}
   	    	}
   	    
    }

    public function storeFile($file, $path)
    {
        
        $filename = time().'_'.$file->getClientOriginalName();

        $file->storeAs($path, $filename, $this->fileSystem());
        
        return $filename;
    }

    public function updateFile($model, $field, $data, $location)
    {
        Storage::disk($this->fileSystem())->delete($model->$field);

        $file = $this->storeFile($data, $location);

        $model->$field = $file;
        
        $model->save();
    }
    public function deleteFile($file)
    {
        Storage::disk($this->fileSystem())->delete($file);
    }
    private function fileSystem()
    {
        return app()->environment('production') ? 's3' : 'public';
    }
    
}

























