<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, string $folder = 'uploads')
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $fileName, 'public');
    }

    public function uploadMultipleFiles(array $files, string $folder = 'uploads')
    {
        $paths = [];
        foreach ($files as $file) {
            $paths[] = $this->uploadFile($file, $folder);
        }
        return $paths;
    }
}
