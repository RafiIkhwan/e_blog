<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $article = Article::findByAuthor(Auth::user()->name);
        return view('admin.pages.dashboard', [
            'articles' => $article,
        ]);
    }
}
