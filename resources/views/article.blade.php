@extends('layouts.app')
@section('content')
@if(Auth::check()&& Auth::user()->is_admin)
  <div class="ui grid">
    <div class="four wide column"></div>
    <div class="eight wide column">  

    <form action="/ajout/article" method="post">
    {{csrf_field()}}
        <label for="name" style="font-size: 20px">Titre: 
          <input type="text" name="title" id="title">
        </label>
        <label for="price" style="font-size: 20px">Texte: 
          <input type="text" name="text" id="text">
        </label>

        <input type="checkbox" name="brouillon">
        <input type="submit" class="btn btn-success">
      </form>    
      <table class="ui celled table">
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Texte</th>
          
        </tr>
        <tr>
          @foreach($article as $value)
          <td>{{$value->id}}</td>
          <td>{{$value->title}}</td>
          <td>{{$value->text}}</td>
          <br>
          <td>
          
           @if($value->brouillon == null) 
            <form action="/home/article/{{$value->id}}" method="post">
              {{csrf_field()}}
              <button class="ui button">Publier</button>


            </form>
            

            @else($value->brouillon == "on") 
             <form action="/home/article/{{$value->id}}" method="post">
              {{csrf_field()}}
              <button class="ui button">Brouillon</button>

            </form>
            @endif
            <form action="/editArticle/{{$value->id}}"  method="get">
            {{csrf_field()}}
            <button class="red ui button ">Edit</button>
            </form>

            <form action="/deleteArticle/{{$value->id}}" method="delete">
              
              <button class="orange ui button">Supprimer</button>
            </form>

           

          </td>
        </tr>
        @endforeach

      </table>
    </div>
    <div class="four wide column"></div>
  </div>
  @else
  <h1>page reservé admin</h1>
  @endif

@stop
