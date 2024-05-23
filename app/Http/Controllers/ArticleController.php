<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index() {
        return view('admin.pages.create_article');
    }

    public function publish(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => 'required',
        ]);

        $input = $request->all();

        $input['author'] = Auth::user()->name;
        $input['slug'] = Str::slug($input['title']);

        if($image = $request->file('cover')) {
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move('images/', $coverImage);
            $input['cover'] = "$coverImage";
        }

        Article::create($input);

        return redirect('/dashboard')->with('success', 'Article posted!');
    }

    public function edit($slug) {
        $article = Article::findBySlug($slug);

        return view('admin.pages.edit_article', [
            'article' => $article,
        ]);

    }

    public function update(Request $request, $slug) {
        $article = Article::findBySlug($slug);

        $input = $request->all();

        $input['author'] = Auth::user()->name;
        $input['slug'] = Str::slug($input['title']);

        if($image = $request->file('cover')) {
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move('images/', $coverImage);
            $input['cover'] = "$coverImage";
        }
        else{
            unset($input['image']);
        }

        $article->update($input);

        return redirect('/dashboard')->with('success', 'Article edited!');

    }

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();

        return redirect('/dashboard')->with('success', 'Article deleted!');

    }
}
