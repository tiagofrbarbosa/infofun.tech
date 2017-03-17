@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Pesquisa</div>
				<div class="panel panel-body">

				@if(!empty($s))
					<form class="form-horizontal" role="form" method="POST" action="{{ action('ResearchController@update', $s->cd_research) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="cd_research" value="{{ $s->cd_research }}">
					<div class="form-group">
						<label class="col-md-4 control-label">Título da pesquisa</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="ds_research" value="{{ $s->ds_research }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Status</label>
						<div class="col-md-6">
							<select name="cd_research_status" class="form-control">
								<option value="1" selected="selected">Aberta</option>
								<option value="2">Finalizada</option>
								<option value="3">Cancelada</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary btn-block"> 
								Gravar
							</button>
						</div>
					</div>
					</form>
					@else

					<div class="alert alert-danger text-center">Pesquisa não encontrada!</div>

					@endif
				</div>
			</div>
		</div>
	</div>

</div>

@endsection