<?php

namespace App\Transformers\Content;

use App\Models\Content\File;

class FileTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(File $file)
    {
        return [
            'id' => $file->id,
            'name' => $file->name,
            'size' => $file->size,
        ];
    }
}
