@extends('layouts.app')
@section('content')


<img src="{{asset('storage/'.$image->image) }}" alt="">
                    
<h3>Visibilità {{($image->visibility) ? 'visibile':'non è visibile'}}</h3>

    <form action="{{ route('admin.destroy', $image) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Elimina</button>
    </form>
    
@endsection