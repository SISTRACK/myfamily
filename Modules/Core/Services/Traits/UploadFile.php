<?php
namespace Modules\Core\Services\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile

{
    public function storeFile($file, $path)
    {
        
        $filename = time().'_'.$file->getClientOriginalName();

        $file->storeAs($path, $filename, $this->fileSystem());
        
        return $path.$filename;
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
		$system = 'production';
		if(app()->environment() == 'local'){
			$system = 'public';
		}

        return $system;
    }
    
}

























