<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $lang = request()->input("lang");
        session()->put('lang', $lang);
        info ("En controlador con idioma seleccionado $lang");
        info ("En controlador variables de sesion", session()->all());

        return redirect()->back();
    }
}
