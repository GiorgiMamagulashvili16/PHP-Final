@extends('layout')

@section('body')
    <form action="{{route("loginUser")}}" method="POST">
        @if(Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span class="text-danger">@error('email') {{$message}} @enderror<span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <span class="text-danger">@error('password') {{$message}} @enderror<span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <a href="{{route("registrationPage")}}">Don't Have An Account? Register!</a>
    </form>
@endsection
