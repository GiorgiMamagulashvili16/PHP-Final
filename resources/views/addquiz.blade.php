@extends('layout')

@section('body')
    <form action="{{ route('addQuiz') }}" method="POST">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="title"><br>
            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="description" class="form-control" placeholder="Description"><br>
            <span class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="image">
            <label>
                <h4>Add image</h4>
            </label>
            <input type="file" class="form-control" required name="image">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <br>

    <a class="btn btn-primary" href="{{ route('questionPage') }}">
        Add Questions
    </a>
@endsection
