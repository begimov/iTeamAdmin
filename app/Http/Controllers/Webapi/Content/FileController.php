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
                return $this->storeMaterialFile($request, $request->file('file'));
                break;
            case 'element':
                return $this->storeElementFile($request, $request->file('file'));
                break;
        }
    }

    public function destroy(Material $material, File $file)
    {
        $this->files->destroy($file);
    }

    protected function storeMaterialFile(Request $request, $file)
    {        
        $material = Material::find($request->parentResourceId);

        $upload = $this->files->store($material, $file);

        Storage::disk('local')->putFileAs(
            'files/materials/id_' . $material->id,
            $file,
            $file->getClientOriginalName()
        );

        return response()->json([
            'id' => $upload->id
        ]);
    }

    protected function storeElementFile(Request $request, $file)
    {        
        // $upload = $this->files->store($material, $file);

        // $this->storeFileOnDisk();

        // return response()->json([
        //     'id' => $upload->id
        // ]);
    }

    protected function storeFileOnDisk()
    {
        Storage::disk('local')->putFileAs(
            'files/materials/id_' . $material->id,
            $file,
            $file->getClientOriginalName()
        );
    }
}
