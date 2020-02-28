<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
      $todos = DB::table('todos')->get();

      return response()->json(array("status" => "success", "data" => $todos), 200);
    }
    
    public function view($id) {
      $todo = DB::table('todos')->where('id', $id)->first();

      return response()->json(array("status" => "success", "data" => $todo), 200);
    }

    public function store(Request $request) {
      $todo = DB::table('todos')->insert([
        "name" => $request->input('name'),
        "description" => $request->input('description'),
      ]);

      return response()->json(array("status" => "success", "data" => $todo), 201);
    }

    public function update(Request $request, $id) {
      $todo = DB::table('todos')->where('id', $id)->update([
        "name" => $request->input('name'),
        "description" => $request->input('description'),
      ]);

      return response()->json(array("status" => "success", "data" => $todo), 200);
    }

    public function delete($id) {
      $todo = DB::table('todos')->where('id', $id)->delete();

      return response()->json(array("status" => "success", "data" => $todo), 201);
    }

} 
