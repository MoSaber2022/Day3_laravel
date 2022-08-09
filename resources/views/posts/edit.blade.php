@extends('layouts.app')

@section('title' , 'Edit')

@section('content')

<form method="POST" action="{{Route('posts.update' , ['id' => $user['id'] ])}}">
    @method('PUT')
    @csrf
    <div class="form-group" >
      <label for="email" class="form-groupl">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{$user['name']}}">

    </div>
    <div class="col-auto">
      <label for="inputPassword6" class="col-form-label">Body</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="body" value="{{$user['email']}}">.

    </div>
    <div class="row g-3 align-items-center">
        <input class="form-check-input" type="radio" name="r1" value="0" id="flexRadioDefault1">
        <label class="form-control" for="exampleFormControlTextarea1">
          UnChecked
        </label>
      </div>
      <div class="row g-3 align-items-center">
        <input class="form-check-input" type="radio" name="r1" id="exampleInputEmail1" value="1" checked>
        <label class="form-control" for="exampleFormControlTextarea1">
          Checked
        </label>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
