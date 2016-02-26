<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LibrosLugares;

class LibrosLugaresController extends Controller
{
    public function index() {
    	$libros = LibrosLugares::all();
    	return $libros;
    }    
}
