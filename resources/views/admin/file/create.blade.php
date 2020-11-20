@extends('layouts.app')

@section('css_lsg')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
@endsection

@section('content')

    <div class="container">
        <h1>Subir imágenes</h1>

        <form action="{{ route('admin.files.store') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
            @csrf
        </form>

        <!--
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fichero" id="" accept="image/*">
                        @error('fichero')
                            <p>
                                <small class="text-danger">Se ha producido un error</small>
                            </p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Subir imagen</button>
                </form>
            </div>
        </div>
    -->



    </div>
@endsection

@section('js_lsg')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
   <script>
   Dropzone.options.myAwesomeDropzone = {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        paramName: "fichero",
        dictDefaultMessage: "Arrastra aquí las imágenes que quieras subir",
        acceptedFiles: "image/*",
        maxFilesize: 0.1,
        maxFiles: 20
  };
</script>
@endsection
