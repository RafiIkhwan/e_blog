<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $heading = Article::query()->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        $article = Article::orderByDesc();
        return view('pages.homepage', [
            'heading' => $heading,
            'articles' => $article,
        ]);
    }

    public function detail($slug) {
        $selected_article = Article::findBySlug($slug);
        return view('pages.detail_article', [
            'article' => $selected_article,
        ]);
    }
}
