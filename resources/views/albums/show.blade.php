{{-- Individual Album --}}
@extends('layouts.app')

@section('content')
	<h2>{{$album->name}}</h2>
	<a href="/" class="button secondary">Go Back</a>
	<a href="/photos/create/{{$album->id}}" class="button">Add Photo</a>

	<hr>

	<div class="grid-x grid-margin-x">
		@foreach ($album->photos as $photo)
	
			<div class="medium-4 cell">
				<h4>{{$photo->title}}</h4>
				<a href="/photos/{{$photo->id}}">
					<img src="/storage/photos/{{$album->id}}/{{$photo->photo}}" alt="{{$photo->title}}" class="thumbnail">
				</a>
			</div>
			
		@endforeach
	</div>
	
@endsection