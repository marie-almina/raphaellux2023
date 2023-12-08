<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use App\Models\Theme;

class HomepageController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() : View
    {
        $themes = Theme::get();

        $data = [
            'h1' => 'Bienvenue sur ÉcologuX !',
            'title' => 'ÉcologuX',
            'themes' => $themes
        ];

        return view('home', $data);
    }
}
