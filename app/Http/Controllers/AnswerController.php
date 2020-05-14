<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Answer;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\ThemeRequest;

class AnswerController extends Controller
{

  

  public function store(AnswerRequest $request, Answer $answer, Theme $theme, User $user)
  {
      $answer->fill($request->all());
      $answer->save();
      return redirect('/');
  }

  public function like(Request $request, Answer $answer)
    {
        $answer->likes()->detach($request->user()->id);
        $answer->likes()->attach($request->user()->id);

        return [
            'id' => $answer->id,
            'countLikes' => $answer->count_likes,
        ];
    }

    public function unlike(Request $request, Answer $answer)
    {
        $answer->likes()->detach($request->user()->id);

        return [
            'id' => $answer->id,
            'countLikes' => $answer->count_likes,
        ];
    }

}


 