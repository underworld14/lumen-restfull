<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class AuthorController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */

     public function index () {
        $author = Author::all();
        $res = array("status" => "success", "data" => $author);
        
        return response()->json($res);
     }

     public function view($id) {
        $author = Author::find($id);
        $res = array("status" => "success", "data" => $author);
        
         return response()->json($res, 200);
     }

     public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'location' => 'required|alpha'
        ]);

         $author = Author::create($request->all());
         $res = array("status" => "success", "data" => $author);

         return response()->json($res, 201);
     }

     public function update(Request $request, $id) {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        $res = array("status" => "success", "data" => $author);

        return response()->json($res, 201);
     }

     public function delete($id) {
        Author::findOrFail($id)->delete();
        $res = array("status" => "success", "message" => "Delete Success");

        return response()->json($res, 201);
     }

}