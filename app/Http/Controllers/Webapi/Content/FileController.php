<?php

namespace App\Http\Controllers\Webapi\Content;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\Products\Material;
use App\Models\Content\File;

class FileController extends Controller
{
    public function store(Material $material, Request $request)
    {
        $file = $request->file('file');

        $upload = $this->storeFile($material, $file);

        Storage::disk('local')->putFileAs(
            'files/materials/id_' . $material->id,
            $file,
            $file->getClientOriginalName()
        );

        return response()->json([
            'id' => $upload->id
        ]);
    }

    protected function storeFile(Material $material, UploadedFile $uploadedFile)
    {
        $file = new File;
        $file->name = $uploadedFile->getClientOriginalName();
        $file->size = $uploadedFile->getSize();
        $file->material()->associate($material);
        $file->save();

        return $file;
    }
}
