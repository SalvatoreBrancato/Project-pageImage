@extends('layouts.app')
@section('content')


    <h1>sono la edit</h1>
    <form action="{{route('admin.update', $image['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="foto" class="form-label">Carica la tua foto</label>
          <input type="file" name="image" class="form-control" id="foto" aria-describedby="emailHelp">
        </div>
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
        {{-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection
