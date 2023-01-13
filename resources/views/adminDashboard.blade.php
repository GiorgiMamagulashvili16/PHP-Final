@extends('layout')
@section('body')
    <div class="cont">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Quiz Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
            
                @forelse($quizzess as $quiz)
                    <tr>

                        <th scope="row">
                            <span>{{ $quiz->title }}</span>
                        </th>
                        <th scope="row">
                            <img src="{{ url('public/Image/'.$quiz->image) }}" style="height: 100px; width: 150px;">
                        </th>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ $questionQuantity}}</td>
                        <td>
                            <a class="btn btn-primary">
                                Start
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('editQuizPage', ['quizId' => $quiz->id]) }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <p>No Quiz found.</p>
                @endforelse

            </tbody>
        </table>
        <br>
        <br>
        <a class="btn btn-primary" href="{{ route('addYourQuizPage') }}">
            Add Your Quiz
        </a>
    </div>
@endsection
