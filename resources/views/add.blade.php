@extends('layouts.app')

@section('content')
    <div class="m-auto " style="width: 40rem;">
        <form action="/addpost" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="exampleInputEmail1" class="form-label">Select pictures</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="images[]" accept=".jpg,.jpeg,.png" multiple>


            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

@endsection