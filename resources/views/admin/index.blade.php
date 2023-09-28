@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class=" d-flex flex-wrap">
                @foreach ($images as $elem)
                <div class="d-flex flex-column">
                    <img style="width: 50%" src="{{asset('storage/'.$elem->image) }}" alt="">
                        
                    {{-- <h3>Visibilità {{$elem->visibility === 1 ? 'visibile':'non è visibile'}}</h3> --}}
                    <h3>Visibilità @if($elem->visibility === 1) visibile @else non è visibile @endif</h3>
                    <h3>{{$elem->visibility}}</h3>
                    <form action="{{ route('admin.destroy', $elem) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger col-6" type="submit">Elimina</button>
                    </form>
                    <a class="btn btn-primary col-6 my-2 " href="{{route('admin.show', $elem)}}">Show</a>
                    <a class="btn btn-primary col-6 mb-2" href="{{route('admin.edit', $elem)}}">Modifica</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection
