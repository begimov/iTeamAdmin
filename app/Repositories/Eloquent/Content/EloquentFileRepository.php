<?php

namespace App\Repositories\Eloquent\Content;

use Illuminate\Http\UploadedFile;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Content\FileRepository;
use App\Models\Content\File;
use App\Models\Products\Material;

class EloquentFileRepository extends EloquentRepositoryAbstract implements FileRepository
{
    public function entity()
    {
        return File::class;
    }

    public function store(Material $material, UploadedFile $uploadedFile)
    {
        $file = $this->entity;
        $file->name = $uploadedFile->getClientOriginalName();
        $file->size = $uploadedFile->getSize();
        // $file->material()->associate($material);
        $file->save();

        return $file;
    }

    public function destroy(File $file)
    {
        $file->delete();
    }
}
