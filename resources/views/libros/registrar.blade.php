@extends('templates.master')
@section('content')
		<h3>Registrar nuevo</h3>
	<div>
		{!! Form::open(array('url' => 'libros/guardar')) !!}
		    <div class="form-group">
		        {!! Form::label('isbn', 'ISBN:') !!}
		        {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
		    </div>		
		    <div class="form-group">
		        {!! Form::label('title', 'Título:') !!}
		        {!! Form::text('title', null, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('author', 'Autor:') !!}
		        {!! Form::text('author', null, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('quantity', 'Cantidad:') !!}
		        {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('place_id', 'Destino:') !!}
		        {!! Form::select('place_id', $places) !!}
		    </div>		    
		    <div class="form-group">
				{!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
		    </div>
		{!! Form::close() !!}
	</div>
@stop