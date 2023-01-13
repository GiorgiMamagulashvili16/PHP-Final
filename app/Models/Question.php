<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";

    protected $fillable = [
        "parentId",
        "authorId",
        "author",
        "position",
        "question",
        "answerOne",
        "answerTwo",
        "answerThree",
        "answerFour",
        "correctAnswer",
        "image"
    ];
}
