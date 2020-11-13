@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Subir imágenes</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fichero" id="" accept="image/*">
                        @error('fichero')
                            <p>
                                <small class="text-danger">{{ message }}</small>
                            </p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Subir imagen</button>
                </form>
            </div>
        </div>


    </div>
@endsection
