<?php

namespace App\Repositories\Contracts\Content;

interface FileRepository
{
  store(Material $material, UploadedFile $uploadedFile)
}
