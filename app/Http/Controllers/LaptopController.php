<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop; 
use Illuminate\Support\Facades\Storage;

class LaptopController extends Controller
{
   
    public function index()
    {
        $laptops = Laptop::all(); 
        return view('laptop.index', compact('laptops')); 
    }

    
    public function create()
    {
        return view('add-laptop');
    }

    
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

      
        Laptop::create([
            'name' => $request->name,
            'release_year' => $request->release_year,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

    
        return redirect()->route('laptop')->with('success', 'Laptop added successfully!');
    }

  
    public function edit($id)
    {
        $laptop = Laptop::findOrFail($id);
        return view('edit-laptop', compact('laptop'));
    }

  
    public function update(Request $request, $id)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
        $laptop = Laptop::findOrFail($id);

      
        if ($request->hasFile('image')) {
  
            if ($laptop->image_path) {
                Storage::disk('public')->delete($laptop->image_path);
            }
     
            $imagePath = $request->file('image')->store('images', 'public');
            $laptop->image_path = $imagePath;
        }

 
        $laptop->name = $request->name;
        $laptop->release_year = $request->release_year;
        $laptop->description = $request->description;
        $laptop->save();

        return redirect()->route('edit-laptop', $laptop->id)->with('success', 'Laptop updated successfully!');
    }

  
    public function destroy($id)
    {
        $laptop = Laptop::findOrFail($id);

   
        if ($laptop->image_path) {
            Storage::disk('public')->delete($laptop->image_path);
        }

 
        $laptop->delete();

        return redirect()->route('dashboard')->with('success', 'Laptop deleted successfully!');
    }
}
