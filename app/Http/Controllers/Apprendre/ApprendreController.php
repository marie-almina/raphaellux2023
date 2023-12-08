<?php

namespace App\Http\Controllers\Apprendre;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Theme;
use Illuminate\View\View;

class ApprendreController extends BaseController
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
    public function index(int $id): View
    {
        $theme = Theme::where('id', $id)->first();
        $themes = Theme::get();

        $data = [
            'h1' => $theme->titre,
            'title' => 'ÉcologuX |' . $theme->titre,
            'themes' => $themes,
            'theme' => $theme
        ];

        return view('apprendre/apprendre', $data);
    }
}
