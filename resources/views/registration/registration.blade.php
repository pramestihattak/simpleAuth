@extends('master')

@section('content')



	<div class="col-md-4">

		
		
	</div>

	<div class="col-md-4">
		<br><br><br><br><br>
		<h3 align="middle">Registration</h3>

		{!! Form::open(['route' => 'post-registration']) !!}

			<div class="form-group"> 
				{!! Form::label('name', 'Name :') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group"> 
				{!! Form::label('email', 'Email :') !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group"> 
				{!! Form::label('password', 'Password :') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</div>

			<div class="form-group"> 
				{!! Form::label('password_confirmation', 'Re-Password :') !!}
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
			</div>

			
			<div class="form-group"> 
				{!! Form::submit('Register', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		
	</div>

	<div>
		

	</div>


@stop