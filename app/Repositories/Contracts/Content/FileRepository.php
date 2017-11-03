<?php

namespace App\Repositories\Contracts\Content;

use Illuminate\Http\UploadedFile;
use App\Models\Products\Material;
use App\Models\Content\File;

interface FileRepository
{
  public function store(Material $material, UploadedFile $uploadedFile);
  public function destroy(File $file);
}
