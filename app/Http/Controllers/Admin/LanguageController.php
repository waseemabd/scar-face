<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function swap($locale)
    {
        $availLocale = ['en' => 'en', 'ar' => 'ar'];

        if (array_key_exists($locale, $availLocale)) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
