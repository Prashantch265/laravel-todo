<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['name' => 'Hello! My name is Prashant'];
        /**
         * Render a blade template with data passed in second argument
         * view('folder.viewname', $data);
         */
        // return view('welcome', $data);

        /**
         * Return JSON response
         * response()->json($data, status code);
         */
        return response()->json($data, 200);
    }
}
