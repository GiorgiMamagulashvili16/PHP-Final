<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function questionPage()
    {
        $currentUser = Auth::user();
        $currentUserQuizzess = DB::table("quizzes")->where("authorId", $currentUser->id)->get();
        return view("addQuestion", ["quizzess" => $currentUserQuizzess]);
    }

    public function addQuestion(Request $request)
    {
        $data = $request->validate([
            "question" => 'required',
            "position" => 'required',
            "answerOne" => 'required',
            "answerTwo" => 'required',
            "answerThree" => 'required',
            "answerFour" => 'required',
            "correctAnswer" => 'required',
            "image" => 'required',
        ]);

        if ($request->file("image")) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $data['image'] = $filename;
        }

        if ($data['correctAnswer'] == "1") {
            $data['correctAnswer'] = $data['answerOne'];
        } else if ($data['correctAnswer'] == "2") {
            $data['correctAnswer'] = $data['answerTwo'];
        } elseif ($data['correctAnswer'] == "3") {
            $data['correctAnswer'] = $data['answerThree'];
        } elseif ($data['correctAnswer'] == "4") {
            $data['correctAnswer'] = $data['answerFour'];
        }
        $positionIsInCorrect = DB::table("questions")->where("parentId", request("parentQuiz"))->where("position", $data['position'])->first();

        $currentUser = Auth::user();
        if ($positionIsInCorrect) {
            return back()->with("error", "please choose another position for your question");
        } else {
            $result = Question::create([
                "parentId" => request("parentQuiz"),
                "authorId" => $currentUser->id,
                "author" => $currentUser->username,
                "question" => $data['question'],
                "position" => $data['position'],
                "answerOne" => $data['answerOne'],
                "answerTwo" => $data['answerTwo'],
                "answerThree" => $data['answerThree'],
                "answerFour" => $data['answerFour'],
                "correctAnswer" => $data['position'],
                "image" => $data['image']
            ]);
            if ($result) {
                return back()->with("success", "successfully added question, add more ");
            } else {
                return back()->with("error", "error occured");
            }
        }
    }
}
