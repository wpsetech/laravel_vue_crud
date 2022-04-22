<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function index()
    {
        $Students = Students::all()->toArray();
        return array_reverse($Students);      
    }
    public function store(Request $request)
    {
        $Students = new Students([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $Students->save();
        return response()->json('Students created!');
    }
    public function show($id)
    {
        $Students = Students::find($id);
        return response()->json($Students);
    }
    public function update($id, Request $request)
    {
        $Students = Students::find($id);
        $Students->update($request->all());
        return response()->json('Students updated!');
    }
    public function destroy($id)
    {
        $Students = Students::find($id);
        $Students->delete();
        return response()->json('Students deleted!');
    }
}
