@extends('templates.master')
@section('content')
      <div class="container">
        <a class="btn btn-lg btn-success" href="libros/registrar">Registrar</a>
        <a class="btn btn-lg btn-success" href="#">Buscar</a>
        <a class="btn btn-lg btn-success" href="#">Cambiar</a>
      </div>

      <div class="container">
        <h1>Últimos libros:</h1>
    </div>

      <div class="container">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>id</th>
              <th>Título</th>
              <th>Autor</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($libros as $libro)
            <tr>
              <td><a href="libros/detalles/{{ $libro->id }}">{{ $libro->id }}</td>
              <td>{{ $libro->title}}</td>
              <td>{{ $libro->author }}</td>
              <td>{{ $libro->quantity }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
@stop