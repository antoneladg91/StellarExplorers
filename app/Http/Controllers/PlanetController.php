<?php

namespace App\Http\Controllers;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
        public function index()
        {
            $planets = Planet::all();
            return view('planets.index', compact('planets'));
        }
    
      
        public function create()
        {
            return view('planets.create');
        }
    
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'quantity' => 'required|integer',
                'fecha_lanzamiento' => 'required|date'
            ]);
    
            Planet::create($request->all());
    
            return redirect()->route('planets.index');
        }
    
        public function show(Planet $planet)
        {
            return view('planets.show', compact('planet'));
        }
    
      
        public function edit(Planet $planet)
        {
            return view('planets.edit', compact('planet'));
        }
    
    
        public function update(Request $request, Planet $planet)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'distance_from_sun' => 'required|numeric',
            ]);
    
            $planet->update($request->all());
    
            return redirect()->route('planets.index');
        }
    
  
        public function destroy(Planet $planet)
        {
            $planet->delete();
            return redirect()->route('planets.index');
        }
    }
    

