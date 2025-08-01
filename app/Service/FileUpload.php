<?php
namespace App\Service;

class FileUpload implements FileUploadInterface {

    public function uploadFiles($file,string $destinationPath){
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        // Get the original file name
        $fileName = rand(11111111, 9000000) . $file->getClientOriginalName();

        $file->move($destinationPath, $fileName);


        return $fileName;
    }



}