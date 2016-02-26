@extends('templates.master')
@section('content')
        <h3>Detalles {{ $detalles_libro->isbn }}</h3>
        <p><b>Id: </b>{{ $detalles_libro->id }}</p>
        <p><b>Título: </b> {{ $detalles_libro->title }}</p>
        <p><b>Autor: </b> {{ $detalles_libro->author }}</p>
        <p><b>Cantidad: </b> {{ $detalles_libro->quantity }}</p>

        <div>
          <hr>
          <p><b>Lugar: </b>{{ $detalles_libro->place->name }}</p>
        </div>
@stop