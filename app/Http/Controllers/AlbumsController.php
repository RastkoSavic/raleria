<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
	public function index()
	{
		// Get All Albums
		$albums = Album::with('Photos')->get();

		return view('albums.index')->with('albums', $albums);
	}

	public function create()
	{
		return view('albums.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'cover_image' => 'image|max:1999'
		]);

		// Get file name with extension 
		$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

		// Get file name
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		
		// Get file extension
		$extension = $request->file('cover_image')->getClientOriginalExtension();

		// Make new file name
		$filenameToStore = $filename . '_' . time() . '.' . $extension;

		// Upload Image
		$path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

		// Create New Album
		$album = new Album();

		// Set fields
		$album->name = $request->input('name');
		$album->description = $request->input('description');
		$album->cover_image = $filenameToStore;

		// Save Album
		$album->save();

		return redirect('/albums')->with('success', 'Album - ' . $album->name . ' Created');
	}

	public function show($id)
	{
		// Get Album
		$album = Album::with('Photos')->find($id);

		return view('albums.show')->with('album', $album);
	}
}
