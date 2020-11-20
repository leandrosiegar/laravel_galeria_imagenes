@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($files as $file)
             <div class="col-4">
                 <div class="card">
                    <img class="img-fluid" src="{{asset($file->url_foto)}}" alt="">
                    <div class="card-footer">
                        <a href="{{ route('admin.files.edit', $file->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="summit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                 </div>
             </div>
            @endforeach
            <div class="col-12">{{ $files->links() }}</div>
        </div>

    </div>
@endsection
