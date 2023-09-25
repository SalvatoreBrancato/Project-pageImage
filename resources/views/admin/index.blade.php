@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex">
                <h1>sono la index</h1>
                @foreach ($images as $elem)
                <img src="{{asset('storage/'.$elem->image) }}" alt="">
                    
                <h3>Visibilità {{($elem->visibility) ? 'visibile':'non è visibile'}}</h3>
                <form action="{{ route('admin.destroy', $elem) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Elimina</button>
                </form>
                <a class="btn btn-primary" href="{{route('admin.show', $elem)}}">Show</a>
                <a class="btn btn-primary" href="{{route('admin.edit', $elem)}}">Modifica</a>
                @endforeach


            </div>
        </div>
    </div>
    
@endsection
