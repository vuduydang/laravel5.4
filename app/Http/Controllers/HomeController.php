<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index(){
        set_time_limit(0);
        // build response headers so file downloads.
        $zip = new \ZipArchive();
        $fileUri = public_path('./donhang.zip');
        if (file_exists($fileUri)) {
            unlink($fileUri);
        }

        $zip->open($fileUri, \ZipArchive::CREATE);
        $dir_path = public_path('./donhang');
        $files = File::files($dir_path);

        // Add File in ZipArchive
        foreach($files as $file)
        {
            $zip->addFile($file, basename($file));
        }
        $zip->close();
        return response()->json([
            'url' => last(explode('.',$fileUri))
        ]);
    }
}
