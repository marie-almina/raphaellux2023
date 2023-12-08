<?php

namespace App\Http\Controllers\Quizz;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use App\Helpers\TemplateHelper;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class QuizzController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $themes = Theme::get();
        $questions = Question::get();

        return view('quizz/quizz', ['questions' => $questions, 'i' => 0, 'title' => "Quizz", 'h1'=> "QuizzuX", "themes" => $themes, 'score' => 0]);
    }

    public function showQuestion(Request $request){
        $themes = Theme::get();
        $questions = Question::get();
        $i = $request->questionIndex;
        $answerId = $request->answerId;
        $reponse = Reponse::where("id", $answerId)->first();
        $score = $request->score;
        $score = ($reponse->estVrai == 1) ? $score+1 : $score;
  
        return view('quizz/quizz', ['questions' => $questions, 'i' => $i, 'title' => "Quizz", 'h1'=> "QuizzuX", "themes" => $themes, 'score' => $score]);
    }

    public function getAnswers(Request $request){
        $reponses = Reponse::where('question_id', $request->id)->get()->toArray();
        return json_encode($reponses);
    }
}
