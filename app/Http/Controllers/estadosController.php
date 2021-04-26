<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use Illuminate\Http\Request;

class estadosController extends Controller
{
    
    public function index()
    {
        return Estados::all();
    }

  
   
    public function store(Request $request)
    {
        Estados::create($request->all());
    }

   
    public function show($id)
    {
        return Estados::findOrFail($id);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
