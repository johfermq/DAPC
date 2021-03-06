@extends('layouts.app')
@section('title', 'Editar Alumno')

@section('content')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white shadow-1">
	    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('alumnos.index') }}">Alumno</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('alumnos.edit', $alumno->id) }}">Editar</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Estas Aquí</li>
	  </ol>
	</nav>

	<div class="card">
		<div class="card-header">
			<h1 class="typography-headline">
				<i class="material-icons mr-1">assignment_ind</i> Editar Alumno
			</h1>
		</div>

		<div class="card-body">
			<form method="post" action="{{ route('alumnos.update', $alumno->id) }}" autocomplete="off" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				<blockquote class="blockquote my-3">
				  <p class="mb-0 typography-subheading">Información del Alumno</p>
				  <hr class="w-100">
				</blockquote>

				<div class="form-row">
					<div class="form-group col-md-3">
			    		<label >Tipo de documento</label>
		    			<select name="tipo_docu" class="selectpicker dropdown-dense show-tick selectbox form-control {{ $errors->has('tipo_docu') ? 'is-invalid' : '' }}"  autofocus>
		      				@foreach(Documento::alumno() as $tipo)
		      					<option value="{{ $tipo }}"
		      						@if (old('tipo_docu', $alumno->tipo_docu) === $tipo){{ 'selected' }}@endif>
		      						{{ $tipo }}
		      					</option>
		      				@endforeach
		    			</select>
		                @if ($errors->has('tipo_docu'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('tipo_docu') }}
		                    </div>
		               	@endif
	 				</div>
				  	<div class="form-group col-md-3">
				    	<label>No. Identificación</label>
				   		 <input type="number" name="docu_alum" class="form-control {{ $errors->has('docu_alum') ? 'is-invalid' : '' }}" value="{{ old('docu_alum', $alumno->docu_alum) }}"  autofocus>
		                @if ($errors->has('docu_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('docu_alum') }}
		                    </div>
		               	@endif
				  	</div>
				  	<div class="form-group col-md-3">
				    	<label>Nombres</label>
				   		<input type="text" name="nomb_alum" class="form-control {{ $errors->has('nomb_alum') ? 'is-invalid' : '' }}" value="{{ old('nomb_alum', $alumno->nomb_alum) }}"  autofocus>
		                @if ($errors->has('nomb_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('nomb_alum') }}
		                    </div>
		               	@endif
				  	</div>
				  	<div class="form-group col-md-3">
				    	<label>Primer apellido</label>
				   		<input type="text" name="pape_alum" class="form-control {{ $errors->has('pape_alum') ? 'is-invalid' : '' }}" value="{{ old('pape_alum', $alumno->pape_alum) }}"  autofocus>
		                @if ($errors->has('pape_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('pape_alum') }}
		                    </div>
		               	@endif
				  	</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
				    	<label>Segundo apellido</label>
				   		<input type="text" name="sape_alum" class="form-control {{ $errors->has('sape_alum') ? 'is-invalid' : '' }}" value="{{ old('sape_alum', $alumno->sape_alum) }}" autofocus>
		                @if ($errors->has('sape_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('sape_alum') }}
		                    </div>
		               	@endif
				  	</div>

				  	<div class="form-group col-md-3">
					    <label>Sexo</label>
					    <select name="sexo_alum" class="selectpicker dropdown-dense show-tick selectbox form-control {{ $errors->has('sexo_alum') ? 'is-invalid' : '' }}"  autofocus>
					    	@foreach(Sexo::asociativos() as $sexo)
					      		<option value="{{ $sexo['id'] }}"
					      			@if (old('sexo_alum', $alumno->sexo_alum) === $sexo['id']){{ 'selected' }}@endif>
					      			{{ $sexo['texto'] }}
					      		</option>
					      	@endforeach
					    </select>
		                @if ($errors->has('sexo_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('sexo_alum') }}
		                    </div>
		               	@endif
			 		</div>

			 		<div class="form-group col-md-3">
				    	<label>Fecha de Nacimiento</label>
				    	<input type="text" name="fech_naci" class="datepicker form-control {{ $errors->has('fech_naci') ? 'is-invalid' : '' }}" value="{{ old('fech_naci', optional($alumno->fech_naci)->format('Y-m-d')) }}"  autofocus>
		                @if ($errors->has('fech_naci'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('fech_naci') }}
		                    </div>
		               	@endif
				  	</div>

				  	<div class="form-group col-md-3">
				    	<label>Dirección de residencia</label>
				   		<input type="text" name="dire_alum" class="form-control {{ $errors->has('dire_alum') ? 'is-invalid' : '' }}" value="{{ old('dire_alum', $alumno->dire_alum) }}"  autofocus>
		                @if ($errors->has('dire_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('dire_alum') }}
		                    </div>
		               	@endif
				  	</div>
				</div>

				<div  class="form-row">
				  	<div class="form-group col-md-3">
				    	<label>Barrio de residencia</label>
				   		<input type="text" name="corr_alum" class="form-control {{ $errors->has('corr_alum') ? 'is-invalid' : '' }}" value="{{ old('corr_alum', $alumno->corr_alum) }}" autofocus>
		                @if ($errors->has('corr_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('corr_alum') }}
		                    </div>
		               	@endif
				  	</div>
					<div class="form-group col-md-3">
				    	<label>Nombre del Acudiente</label>
				   		<input type="text" name="nomb_acud" class="form-control {{ $errors->has('nomb_acud') ? 'is-invalid' : '' }}" value="{{ old('nomb_acud', $alumno->nomb_acud) }}" autofocus>
		                @if ($errors->has('nomb_acud'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('nomb_acud') }}
		                    </div>
		               	@endif
				  	</div>

 					<div class="form-group col-md-3">
				    	<label>Correo electrónico</label>
				   		<input type="email" name="corr_alum" class="form-control {{ $errors->has('corr_alum') ? 'is-invalid' : '' }}" value="{{ old('corr_alum', $alumno->corr_alum) }}"  autofocus>
		                @if ($errors->has('corr_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('corr_alum') }}
		                    </div>
		               	@endif
				 	</div>

				 	<div class="form-group col-md-3">
				    	<label>Teléfono</label>
				   		<input type="number" name="tele_alum" class="form-control {{ $errors->has('tele_alum') ? 'is-invalid' : '' }}" value="{{ old('tele_alum', $alumno->tele_alum) }}" autofocus>
		                @if ($errors->has('tele_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('tele_alum') }}
		                    </div>
		               	@endif
				  	</div>

				</div>	
				<div class="form-row">
					<div class="form-group col-md-3">
					   <label>Parentesco del acudiente</label>
					    <select name="pare_acud" class="selectpicker dropdown-dense show-tick selectbox form-control {{ $errors->has('pare_acud') ? 'is-invalid' : '' }}"  autofocus>
					    	{{-- <option>{{ old('pare_acud', $alumno->pare_acud) }}</option> --}}
					    	@foreach(Parentesco::asociativos() as $parentesco)
					      		<option value="{{ $parentesco['id'] }}"
					      			@if (old('pare_acud', $alumno->pare_acud) === $parentesco['id']){{ 'selected' }}@endif>
					      			{{ $parentesco['texto'] }}
					      		</option>
					      	@endforeach
					    </select>
		                @if ($errors->has('pare_acud'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('pare_acud') }}
		                    </div>
		               	@endif
			 		</div>
				</div>

				<div class="form-row">
			 		<div class="form-group col-md-12">
				    	<label>Observaciòn</label>
				    	<textarea name="obse_alum" rows="3" class="form-control {{ $errors->has('obse_alum') ? 'is-invalid' : '' }}" autofocus>{{ old('obse_alum', $alumno->obse_alum) }}
			    		</textarea>
		                @if ($errors->has('obse_alum'))
		                    <div class="invalid-feedback">
		                    	{{ $errors->first('obse_alum') }}
		                    </div>
		               	@endif
				  	</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12 text-center">
			  			<hr class="w-100">
				  		<button type="reset" class="btn btn-secondary">Limpiar</button>
				  		<button type="submit" class="btn btn-primary">Actualizar</button>
				  	</div>
				</div>
			</form>
		</div>
	</div>
@endsection