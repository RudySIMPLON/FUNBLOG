<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use View;



class ArticleController extends Controller
{


	public function show (){
		$articles = Article::all();
		return view('article',['article'=>$articles]);

	}

	public function show1 (){
		$articles = Article::all();
		return view('home',['article'=>$articles]);

	}


	public function ajouter(Request $request){
		$articles= new Article;
		$articles->title = $request->title;
		$articles->text = $request->text;

		$articles->brouillon = $request->brouillon;
          
		$articles->save();
		return back();
	}

	public function formEdit($id){

		$articles=Article::find($id);
	
		return view('formModifArticle',['articles'=>$articles]);

	}

	public function editer($id,Request $request){
		$articles= Article::find($id);
		$articles->title = $request->title;
		$articles->text= $request->text;
		$articles->save();
		return redirect('/');

	}

	public function Supprimer($id){
		$articles = Article::find($id);
		$articles->delete();
		return back();
	}


		public function publier($id){
		
		$articles= Article::find($id);
		if($articles->brouillon == "on"){
			$articles->brouillon = null;
			$articles->save();
			
		return back();	
		
		}else{ $articles->brouillon = "on";
			 $articles->save();
			return back();
		}
	}







}

