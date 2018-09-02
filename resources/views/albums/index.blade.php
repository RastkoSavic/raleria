{{-- Albums Index --}}
@extends('layouts.app')

@section('content')

	<h3>Albums</h3>
	<br>
	
	<div class="grid-x grid-margin-x">
		@foreach ($albums as $album)
	
			<div class="medium-4 cell">
				<h4>{{$album->name}}</h4>
				<a href="/albums/{{$album->id}}">
					<img src="storage/album_covers/{{$album->cover_image}}" alt="" class="thumbnail">
				</a>
			</div>
		 
		@endforeach
	</div>

@endsection