<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends BaseController
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
            'h1' => 'Nous contacter',
            'title' => 'Contact',
            'themes' => $themes,
        ];

        return view('contact/contact', $data);
    }

    public function envoiMail(Request $request)
    {
        return redirect('/contact')->with([
            'ok' => true,
            'nom' => $request->nom,
            'prenom' => $request->prenom
        ]);
    }
}
