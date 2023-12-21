<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function index(){
        $alldata=DB::table('albums')->get();
        return view('Home',compact('alldata'));
    }
    public function createalbum(){
        return view('pages.create');
    }

    public function storealbum(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'cover_image' => 'required|image|nullable|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded image
        ]);
    
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Move image to the desired directory
        }
    
        // Check if $imageName is set, then insert into the database
        if (isset($imageName)) {
            DB::table('albums')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'cover_image' => $imageName // Use $imageName variable directly
            ]);
    
            return redirect()->back()->with('success', 'Album created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to upload cover image');
        }
    }
    

    public function deletealbum( Request $request,$id)
    {
       
        // Find the album by ID
        $album = DB::table('albums')->where('id', $id)->first();
    
        if ($album) {
            // Get the path of the cover image
            $coverImagePath = public_path('images/' . $album->cover_image);
    
            // Check if the cover image exists and delete it
            if (file_exists($coverImagePath)) {
                unlink($coverImagePath); // Delete cover image
            }
    
        
            // Delete album record from the database
            DB::table('albums')->where('id', $id)->delete();
    
            return redirect()->back()->with('success', 'Album deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Album not found');
        }
    }
    




}
 

