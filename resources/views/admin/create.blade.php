@extends('layouts.app')
@section('content')

<form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="foto" class="form-label">Carica la tua foto</label>
      <input type="file" name="image" class="form-control" id="foto" aria-describedby="emailHelp">
    </div>
      {{-- @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror --}}
      
    {{-- <div class="mb-3 col-12">
        <label class="d-block" for="visibility">
           <strong>Vuoi rendere visibile la tua foto?</strong>
        </label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" id="visibility" value="true" checked>
            <label class="form-check-label" for="visibility">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" id="visibility" value="false" >
            <label class="form-check-label" for="visibility">
                No
            </label>
        </div>
    </div> --}}
   
    <div id="edit-tags" class="form-group mt-3 mb-4">
        <div class="form-label">
            Tag:
        </div>
        <div class="row">
          {{-- @error('tag')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
            @foreach ($tags as $elem)
                <div class="col-3 col-sm-2 d-flex align-items-center ms-4 mb-3">                    
                  <input class="tags-checks" type="checkbox" id="check-tag-{{$elem->tag}}" value="{{$elem->id}}" name="tags[]"> 
                  <label for="check-tag-{{$elem->tag}}" class="text-capitalize ms-1">{{$elem->tag}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    

@endsection
