@extends('layouts.app')
@section('title', 'Registrar Utiles')

@section('content')
	<nav aria-label="breadcrumb">
	  	<ol class="breadcrumb bg-white shadow-1">
		    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
		    <li class="breadcrumb-item"><a href="{{ route('implementos.index') }}">Utiles</a></li>
		    <li class="breadcrumb-item"><a href="{{ route('implementos.create') }}">Registrar</a></li>
	    	<li class="breadcrumb-item active" aria-current="page">Estas Aquí</li>
	  	</ol>
	</nav>

	<div class="card">
		<div class="card-header">
	  		<h1 class="typography-headline">
	  			<i class="material-icons mr-1">library_books</i> Registrar Utiles
	  		</h1>
	  	</div>
		<div class="card-body">
			<form  method="post" action="{{ route('implementos.store') }}" autocomplete="off" >
				{{ csrf_field() }}
				<div class="form-row">
					<div class="form-group col-md-12">
				    	<label>Nombre del Util </label>
				   		 <input type="text" name="nomb_util" class="form-control {{ $errors->has('nomb_util') ? 'is-invalid' : '' }}" value="{{ old('nomb_util') }}" required autofocus>
		                @if ($errors->has('nomb_util'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('nomb_util') }}
		                    </div>
		               	@endif
			  		</div>
			  	</div>
			  	<div class="form-row">

			 		<div class="form-group col-md-12">
				    	<label>Descripción</label>
				    	<textarea name="desc_util" rows="3" class="form-control {{ $errors->has('desc_util') ? 'is-invalid' : '' }}"  required autofocus>
			    			{{ old('desc_util') }}
			    		</textarea>
		                @if ($errors->has('desc_util'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('desc_util') }}
		                    </div>
		               	@endif
				  	</div>
				</div>

				<div class="form-row">
                <div class="form-group col-md-12">

                    <ul class="list-group list-group-flush">
                    	@foreach($grados as $grado)
	                        @foreach($grado->subGrados->chunk(15) as $chunk)
	                            @foreach($chunk as $subgrado)
	                                <li class="list-group-item list-group-item-action">
	                                    <div class="custom-control custom-checkbox">
	                                        <input type="checkbox"
	                                            id="customCheck{{ $subgrado->id }}" name="subgrados[{{ $subgrado->id }}]"
	                                            class="custom-control-input {{ $errors->has('subgrados.' . $subgrado->id) ? 'is-invalid' : '' }}"
	                                             value="{{ $subgrado->id }}"
	                                            {{ old('subgrados.' . $subgrado->id) === $subgrado->id ? 'checked' : '' }}>
	                                        <label class="custom-control-label" for="customCheck{{ $subgrado->id }}">
	                                            {{ $grado->abre_grad . ' &middot; ' . $subgrado->abre_subg . ' &middot; Jornada '. $grado->getJornada() }}
	                                        </label>
	                                        @if ($errors->has('subgrados.' . $subgrado->id))
	                                            <div class="invalid-feedback">
	                                                {{ $errors->first('subgrados.' . $subgrado->id) }}
	                                            </div>
	                                        @endif
	                                    </div>
	                                </li>
	                            @endforeach
	                        @endforeach
	                     @endforeach
                    </ul>
                </div>
            </div>
				<div class="form-row">
					<div class="form-group col-md-12 text-center">
			  			<hr class="w-100">
				  		<button type="reset" class="btn btn-secondary">Limpiar</button>
				  		<button type="submit" class="btn btn-primary">Registrar</button>
				  	</div>
				</div>
			</form>	
		</div>
	</div>
@endsection