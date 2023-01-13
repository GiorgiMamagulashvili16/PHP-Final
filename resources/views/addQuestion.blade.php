@extends('layout')

@section('body')
    <form action="{{ route('addQuestionRoute') }}" method="POST">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @csrf

        <select class="form-select form-select-lg mb-3" name="parentQuiz" aria-label=".form-select-lg example"
            aria-placeholder="parentQuiz">
            @forelse ($quizzess as $quiz)
                <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
            @empty
            <option value="empty">You have not quiz</option>
            @endforelse
        </select>

        <div class="input-group mb-3">
            <input type="text" name="question" class="form-control" placeholder="Question"><br>
            <span class="text-danger">
                @error('question')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="number" name="position" class="form-control" placeholder="Question Position"><br>
            <span class="text-danger">
                @error('position')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="answerOne" class="form-control" placeholder="AnswerOne"><br>
            <span class="text-danger">
                @error('answerOne')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="answerTwo" class="form-control" placeholder="answerTwo"><br>
            <span class="text-danger">
                @error('answerTwo')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="answerThree" class="form-control" placeholder="answerThree"><br>
            <span class="text-danger">
                @error('answerThree')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="answerFour" class="form-control" placeholder="answerFour"><br>
            <span class="text-danger">
                @error('answerFour')
                    {{ $message }}
                @enderror
                <span>
        </div>
        <span>Correct Answer is: </span>
        <select class="form-select form-select-lg mb-3" name="correctAnswer" aria-label=".form-select-lg example"
            aria-placeholder="correctAnswer">
            <option value="1">First Answer</option>
            <option value="2">Second Answer</option>
            <option value="3">Third Answer</option>
            <option value="4">Four Answer</option>
        </select>

        <div class="image">
            <label>
                <h4>Add image</h4>
            </label>
            <input type="file" class="form-control" required name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
