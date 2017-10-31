<?php

namespace App\Http\Controllers\Webapi\Content;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Material;

class FileController extends Controller
{
    public function store(Material $material, Request $request)
    {
        $file = $request->file('file');

        Storage::disk('local')->putFileAs(
            'files/materials' . $material->id,
            $file,
            'test.png'
        );

        return response()->json([
            'id' => 1
        ]);
    }
}
