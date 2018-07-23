<?php

namespace App\Transformers\Products;

use App\Models\Content\File;

class FileTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(File $file)
    {
        return [
            'id' => $file->id,
            'material_id' => $file->material_id,
            'name' => $file->name,
            'size' => $file->size,
        ];
    }
}
