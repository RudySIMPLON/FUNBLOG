@extends('layouts.app')
@section('content')
@if(Auth::check())

  <div class="ui grid">
    <div class="four wide column"></div>
    <div class="eight wide column">  

    <form action="/modification/{{$articles->id}}" method="post">
    {{csrf_field()}}
        <label for="name">Title
          <input type="text" name="title"   value="{{$articles->title}}">
        </label>

        <label for="stock">Text
          <input type="text" name="text" id="text" value="{{$articles->text}}">
        </label>
        <input type="submit">
      </form> 
      @else
  <h1>page reservé admin</h1>
  @endif

@stop
