@extends('layouts.app')
@section('content')

    <form action="{{route('admin.update', $image['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="foto" class="form-label">Carica la tua foto</label>
          <input type="file" name="image" class="form-control" id="foto" aria-describedby="emailHelp">
        </div>
        @if($user_id == 1)
        <div class="mb-3 col-12">
            <label class="d-block" for="visibility">
               <strong>Vuoi rendere visibile la tua foto?</strong>
            </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1" checked>
                <label class="form-check-label" for="visibility">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visibility" id="visibility" value="0" >
                <label class="form-check-label" for="visibility">
                    No
                </label>
            </div>
        </div>
        @endif
        <div id="edit-fields" class="form-group mt-3 mb-4">
            <div class="form-label">
                Tag:
            </div>
            {{-- @error('fields')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <div class="row">
                @foreach ($tags as $elem)
                    <div class="col-3 col-sm-2 d-flex align-items-center ms-4 mb-3">

                            <input class="tags-checks" type="checkbox" id="check-tag-{{$elem->tag}}" value="{{$elem->id}}" name="tags[]">                        
    
                        <label for="check-tag-{{$elem->tag}}" class="text-capitalize ms-1">
                            {{$elem->tag}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection
