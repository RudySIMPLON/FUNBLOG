@extends('layouts.app')
@section('content')
@if(Auth::check())


  <div class="ui grid">
    <div class="four wide column"></div>
    <div class="eight wide column">  

    <form action="/profil/update/{{Auth::User()->id}}" method="post">
    {{csrf_field()}}
        <label for="name">Nom
          <input type="text" name="name" id="name"  value="{{$users->name}}">
        </label>

        <label for="email">Email
          <input type="email" name="email" id="email" value="{{$users->email}}">
        </label>
      

        <label for="password">Mot de passe
          <input type="text" name="password" id="password" value="">
        </label>
        <input type="submit" class="btn btn-success">
      
      



      </form> 
@endif
      @stop  