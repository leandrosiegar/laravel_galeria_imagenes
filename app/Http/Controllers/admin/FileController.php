<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)->paginate(10);
        return view('admin.file.index', compact("files"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fichero' => 'required|image'
        ]);

        // el store te lo almacena en la carpeta storage
        // ejecutar antes: php artisan storage:link para crear acceso directo
        // y luego cuando se pase a producción volver a ejecutarlo para q se cree tb en el servidor
        // MODO tradicional SIN Dropzone:
        /*
        $imagenAux = $request->file('fichero')->store('public/imagenes');
        $url = Storage::url($imagenAux);
        File::create([
            'url_foto' => $url
        ]);
        */
        // FIN Modo tradicional  Sin Dropzone

        $nombre = Str::random(10)."_".$request->file('fichero')->getClientOriginalName();
        $ruta = storage_path().'\app\public\imagenes/' . $nombre;

        Image::make($request->file('fichero'))
                ->resize(700, null, function ($constraint) { // min 700 de ancho
                    $constraint->aspectRatio();
                })
                ->save($ruta);

        File::create([
            'user_id' => auth()->user()->id,
            'url_foto' => 'storage/imagenes/' . $nombre
        ]);


        // return redirect()->route('admin.files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return view('admin.file.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($file)
    {
        return view('admin.file.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        //
    }
}
