<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\Place;

class BooksController extends Controller
{
    public function index() {
    	$libros = Book::all();
    	return $libros;
    }

    public function last5() {
    	$libros = Book::orderBy('id', 'desc')
    	->take(5)
    	->get();
    	return view('libros.index')->with('libros', $libros);
    }

    public function detalles_libro($id) {
    	$detalles_libro = Book::with('place')->find($id);
        //return $detalles_libro;
        return view('libros.detalles')->with('detalles_libro', $detalles_libro);

    }

    public function registrar() {
        $places = Place::lists('name', 'id');
        return view('libros.registrar')->with('places', $places);
        //return $places;
    }

    public function guardar(Request $request) {
        $libro = new Book;

        $libro->isbn = $request->input('isbn');
        $libro->title = $request->input('title');
        $libro->author = $request->input('author');
        $libro->place_id = $request->input('place_id');
        $libro->quantity = $request->input('quantity');
        $libro->save();

        //return $request->all();


            // for ($x = 0; $x < $libro->cantidad; $x++) {
            //     $libro_lugar = new BooksLugares;
            //     $libro_lugar->libro_id = Book::where('titulo', '=', $libro->titulo)->pluck('id');
            //     $libro_lugar->lugar_id = '999';
            //     $libro_lugar->save();
            // } 
        
    }    
}
