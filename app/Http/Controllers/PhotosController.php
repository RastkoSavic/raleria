<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
   public function create($album_id)
	{
		return view('photos.create')->with('album_id', $album_id);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'cphoto' => 'image|max:1999'
		]);

		// Get file name with extension 
		$filenameWithExt = $request->file('photo')->getClientOriginalName();

		// Get file name
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		
		// Get file extension
		$extension = $request->file('photo')->getClientOriginalExtension();

		// Make new file name
		$filenameToStore = $filename . '_' . time() . '.' . $extension;

		// Upload Image
		$path = $request->file('photo')->storeAs('public/photos/' . $request->input('album_id'), $filenameToStore);

		// Create New Album
		$photo = new Photo();

		// Set fields
		$photo->album_id = $request->input('album_id');
		$photo->title = $request->input('title');
		$photo->description = $request->input('description');
		$photo->size = $request->file('photo')->getClientSize();
		$photo->photo = $filenameToStore;

		// Save Album
		$photo->save();

		return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo - ' . $photo->title . ' Uploaded');
	}
}
