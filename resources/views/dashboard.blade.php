@extends('layouts.app')

@section('content')

<h1>sono la dashboard</h1>
@foreach ($images as $elem)
    
    @foreach ($elem->tag as $item)
        <div>{{$item->tag}}</div>
    @endforeach

    @foreach ($elem->comment as $item)
        <div>{{$item->comment}}</div>
    @endforeach

    @foreach ($elem->user as $item)
        <div>{{$item->name}}</div>
    @endforeach
    
@endforeach
@endsection
