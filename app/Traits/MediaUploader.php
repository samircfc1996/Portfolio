<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait MediaUploader
{

    public function initUpload(UploadedFile $file, $path)
    {
        Storage::disk('public')->makeDirectory($path);

        $file_name = $file->getClientOriginalName();

        $file->move(storage_path('app/public/'.$path), $file_name);

        return $file_name;
    }

}
