<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{

    public function dashboardPage()
    {
        $data = DB::table("quizzes")->where("isVisible", true)->orderBy('created_at', 'DESC')->get();
        return view("dashboard", ["quizzess" => $data]);
    }

    public function adminDashboardPage()
    {
        $result = array();
        $data = DB::table("quizzes")->orderBy('created_at', 'DESC')->get();
        return view("adminDashboard", ["quizzess" => $data]);
    }

    public function editPage($quizId)
    {
        $data = DB::table("quizzes")->where("id", $quizId)->first();
        return view("editquiz", ["quiz" => $data]);
    }

    public function editQuiz($quizId)
    {
        if (request()->input("title")) {
            $quiz = Quiz::find($quizId);
            $quiz->title = request("title");
            $quiz->description = request("description");
            if (request()->input("visibility") == "visible") {
                $quiz->isVisible = true;
            } else {
                $quiz->isVisible = false;
            }
            $quiz->update();
            return redirect(route("adminDashPage"));
        }
    }
    public function addQuizPage()
    {
        return view("addquiz");
    }

    public function addQuiz(Request $request)
    {
        $data = $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => 'required',
        ]);
        $currentUser = Auth::user();

        if ($request->file("image")) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $data['image'] = $filename;
        }
        $result = Quiz::create([
            "authorId" => $currentUser->id,
            "title" => $data['title'],
            "description" => $data['description'],
            "author" => $currentUser->username,
            "image" => $data['image'],
        ]);

        if ($result) {
            return back()->with('success', 'Quiz added successfully');
        } else {
            return back()->with('error', 'error occured');
        }
    }
}
