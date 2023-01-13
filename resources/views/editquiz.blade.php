@extends('layout')

@section('body')
    <form action="{{ route('editQuiz', ['quizId' => $quiz->id]) }}" method="POST">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="title" value="{{ $quiz->title }}"><br>
            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="description" class="form-control" placeholder="Description"
                value="{{ $quiz->description }}"><br>
            <span class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <select class="form-select form-select-lg mb-3" name="visibility" aria-label=".form-select-lg example"
            aria-placeholder="visibility">
            <option value="visible">Visible</option>
            <option value="invisible">InVisible</option>
        </select>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
