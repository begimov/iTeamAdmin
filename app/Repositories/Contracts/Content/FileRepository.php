<?php

namespace App\Repositories\Contracts\Content;

use Illuminate\Http\UploadedFile;
use App\Models\Products\Material;

interface FileRepository
{
  public function store(Material $material, UploadedFile $uploadedFile);
}
