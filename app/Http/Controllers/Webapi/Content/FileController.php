<?php

namespace App\Http\Controllers\Webapi\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Material;

class FileController extends Controller
{
    public function store(Material $material, Request $request)
    {
        var_dump($material->name, $request->all());
    }
}
