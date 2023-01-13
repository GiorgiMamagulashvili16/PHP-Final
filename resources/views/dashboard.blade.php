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
                            <img src="storage/app/public/{{ $quiz->image }}">
                        </th>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ $quiz->author }}</td>
                        <td>
                            <a class="btn btn-primary">
                                Start
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
