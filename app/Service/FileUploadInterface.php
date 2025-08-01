<?php
namespace App\Service;

interface FileUploadInterface {

    public function uploadFiles($file,string $destinationPath);
    
}