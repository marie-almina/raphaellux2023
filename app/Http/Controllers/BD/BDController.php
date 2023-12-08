<?php

namespace App\Http\Controllers\BD;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BDController extends BaseController
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
    public function index() : View
    {
        $themes = Theme::get();

        $data = [
            'h1' => 'Bande dessinée',
            'title' => 'Bande dessinée',
            'themes' => $themes,
        ];

        return view('bd/bd', $data);
    }
}
