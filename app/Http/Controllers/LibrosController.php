<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libro;
use App\LibrosLugares;


class LibrosController extends Controller
{
    public function index() {
    	$libros = Libro::all();
    	return $libros;
    }

    public function last5() {
    	$libros = Libro::orderBy('id', 'desc')
    	->take(5)
    	->get();
    	return view('libros.index')->with('libros', $libros);
    }

    public function detalles_libro($id) {
    	// $detalles_libro = Libro::select('libros.id', 'libros.isbn', 'libros.autor', 'libros.titulo','libros.cantidad')
    	// ->leftJoin('libros_lugares', 'libros_lugares.libro_id', '=', 'libros.id')
    	// ->leftJoin('lugares','libros_lugares.lugar_id', '=', 'lugares.id')
    	// ->find($id);
        
        $detalles_libro = Libro::find(1)->lugare;
        return $detalles_libro;

    	//return view('libros.detalles')->with('detalles_libro', $detalles_libro);
    }

    public function registrar() {
        return view('libros.registrar');
    }

    public function guardar(Request $request) {
        $libro = new Libro;

        $libro->isbn = $request->input('isbn');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->cantidad = $request->input('cantidad');
        $libro->save();

        echo 'yahoo';

            for ($x = 0; $x < $libro->cantidad; $x++) {
                $libro_lugar = new LibrosLugares;
                $libro_lugar->libro_id = Libro::where('titulo', '=', $libro->titulo)->pluck('id');
                $libro_lugar->lugar_id = '999';
                $libro_lugar->save();
            } 
        
    }
}
