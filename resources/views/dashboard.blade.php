@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap align-items-center">

    @foreach ($images as $elem)
        
        <div id="box-dashboard" class="my-3 d-flex flex-column justify-content-around">
            <img style="width: 20%" src="{{asset('storage/'.$elem->image) }}" alt="">
            <div>id_image: {{$elem->id}}</div>
            <div>
                @foreach ($elem->user as $item)
                    <div>Utente: {{$item->name}}</div>
                @endforeach
            </div>
            <div>
                Tag:
                @foreach ($elem->tag as $item)
                    <span>#{{$item->tag}} </span>
                @endforeach
            </div>
            <div>
                Commenti:
                @foreach ($elem->comment as $item)
                    <div>- {{$item->comment}}</div>
                @endforeach
            </div>
        </div>
        
    @endforeach
    
</div>
@endsection
