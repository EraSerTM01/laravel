<?php

namespace App\Http\Controllers;



use App\Models\Article;

use Illuminate\Http\Request;





class ArticleController extends Controller
{
    public function show(Request $request, Article $article)
    {
        dump($article);
        dump($article->user);
    }
}
