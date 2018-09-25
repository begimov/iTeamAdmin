<?php

namespace App\Http\Controllers\Webapi\Content;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\Products\Material;
use App\Models\Content\File;

use App\Repositories\Contracts\Content\FileRepository;

class FileController extends Controller
{
    protected $files;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FileRepository $files)
    {
        $this->files = $files;
    }

    public function store(Request $request)
    {
        switch ($request->parentResourceType) {
            case 'material':
                $upload = $this->storeMaterialFile($request, $request->file('file'));
                break;
            case 'element':
                $upload = $this->storeElementFile($request, $request->file('file'));
                break;
        }
        return response()->json([
            'id' => $upload->id
        ]);
    }

    public function destroy(Material $material, File $file)
    {
        $this->files->destroy($file);
    }

    protected function storeMaterialFile(Request $request, $file)
    {        
        $material = Material::find($request->parentResourceId);

        $upload = $this->files->store($material, $file);

        $this->storeFileOnDisk('local', 'files/materials/id_' . $material->id, $file);

        return $upload;
    }

    protected function storeElementFile(Request $request, $file)
    {        
        $upload = $this->files->storeElementFile($file);

        $this->storeFileOnDisk('public', 'files/elements/' . $upload->created_at->toDateString(), $file);

        return $upload;
    }

    protected function storeFileOnDisk($disk, $path, $file)
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        Storage::disk($disk)->putFileAs($path, $file, \Slugify::slugify($name) . '.' . $extension);
    }
}
