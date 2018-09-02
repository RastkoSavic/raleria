{{-- Individual Album --}}
@extends('layouts.app')

@section('content')
	<h2>{{$album->name}}</h2>
	<a href="/" class="button secondary">Go Back</a>
	<a href="/photos/create/{{$album->id}}" class="button">Add Photo</a>

	<hr>
	
@endsection