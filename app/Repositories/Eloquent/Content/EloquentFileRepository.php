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
        list($originalName, $name, $extension, $size) = $this->getFileMetaData($uploadedFile);

        $file = $this->entity;

        $file->name = $this->slugify($name, $extension);
        $file->size = $size;
        $file->original_name = $originalName;
        $file->material()->associate($material);

        $file->save();

        return $file;
    }

    public function storeElementFile(UploadedFile $uploadedFile)
    {
        list($originalName, $name, $extension, $size) = $this->getFileMetaData($uploadedFile);

        $file = $this->entity;

        $file->name = $this->slugify($name, $extension);
        $file->size = $size;
        $file->original_name = $originalName;

        $file->save();

        return $file;
    }

    public function destroy(File $file)
    {
        $file->delete();
    }

    protected function slugify($name, $extension)
    {
        return \Slugify::slugify($name) . '.' . $extension;
    }

    protected function getFileMetaData(UploadedFile $uploadedFile)
    {
        return [
            $originalName = $uploadedFile->getClientOriginalName(),
            pathinfo($originalName, PATHINFO_FILENAME),
            $uploadedFile->getClientOriginalExtension(),
            $uploadedFile->getSize()
        ];
    }
}
