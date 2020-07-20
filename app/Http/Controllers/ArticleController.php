<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{


    //protected $primaryKey = 'articleID';
    public function index(article $article)
    {
        return ArticleResource::collection(article::all());
        //return article::all();
        //return new ArticleResource($article);
    }
    public function show(article $article){
        //return $article;
        return new ArticleCollection($article);
    }
    public function store(ArticleRequest $request, article $article)
    {
        $review = new article($request->all());
        $article->reviews()->save($review);
        return reponse(['data' => new ArticleResource($review),201]);
    }
    public function update(Request $request, $id)
    {
        $article    = article::findOrFail($id);
        $article->update($request->all());
        return reponse()->json($article,200);
    }
    public function delete(article $article)
    {
        $article->delete();
        return reponse()->json($article ,204);
    }
    public function destroy(article $article)
    {
        $article->delete();
        return reponse(null,204);
    }
}
