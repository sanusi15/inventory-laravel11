<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        return view('position.index')->with([
            'page_title' => 'List of Positions',
            'positions' => Positions::orderBy('position_name', 'asc')->get(),
            'custom_js' => 'position.js',
        ]);        
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name'
        ]);
        Positions::create($request->all());
        return redirect()->route('positions')->with([
            'status_message' => 'success',
            'value_message' => 'Position has been created'
        ]);        
    }

    public function show(Positions $position)
    {
        return response()->json($position);        
    }

    public function update(Request $request, Positions $position)
    {
        $position->update($request->all());
        return redirect()->route('positions')->with([
            'status_message' => 'success',
            'value_message' => 'Position has been updated'
        ]);     
    }

    public function destroy(Positions $position)
    {
        $position->delete();
        return redirect()->route('positions')->with(
            [
                'status_message' => 'success',
                'value_message' => 'Position deleted'
            ]
        );  
    }
}
