@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Empresa</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="{{ old('password') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Data nascimento</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="dt_birthday" id="datepicker" value="{{ old('dt_birthday') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Sexo</label>
							<div class="col-md-6">
								<select name="cd_genre" class="form-control">
									<option value="1" selected="selected">Masculino</option>
									<option value="2">Feminino</option>
									<option value="3">Outros</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Receber Newsletter: </label>
							<div class="col-md-6">
								<select name="sn_research_email_list" class="form-control">
									<option value="S" selected="selected">Sim</option>
									<option value="N">Não</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
