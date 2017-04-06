@extends('layouts.app')
@section('content')
@if(Auth::check())

<ul>
	<li>{{Auth::User()->name}}</li>
	<li>{{Auth::User()->email}}</li>
<br>
<br>
	<button ><a href="/profil/{{Auth::User()->id}}">Editer Profil</a></button>
</ul>
 @else
<h1>page reservé admin</h1>
@endif
@stop