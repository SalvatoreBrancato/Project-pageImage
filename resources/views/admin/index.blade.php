@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class=" d-flex">
                <div class="d-flex flex-column">
                    <h1>sono la index</h1>
                    @foreach ($tags as $elem)
                        <h3>{{$elem->tag}}</h3>
                    @endforeach
                    @foreach ($images as $elem)
                    <img style="width: 20%" src="{{asset('storage/'.$elem->image) }}" alt="">
                        
                    <h3>Visibilità {{($elem->visibility) ? 'visibile':'non è visibile'}}</h3>
                    <form action="{{ route('admin.destroy', $elem) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                    <a class="btn btn-primary col-1 my-2" href="{{route('admin.show', $elem)}}">Show</a>
                    <a class="btn btn-primary col-1 mb-2" href="{{route('admin.edit', $elem)}}">Modifica</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection
