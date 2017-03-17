@extends('app')

@section('content')

<div class="container">

	@if(empty(old('ds_research')))
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nova Pesquisa</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ action('ResearchController@create') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="cd_user" value="{{ Auth::user()->id }}">
						<input type="hidden" name="cd_research_status" value="1">

						<div class="form-group">
							<label class="col-md-4 control-label">Título da pesquisa</label>
							<div class="col-md-6">
								<input type="text"  class="form-control" name="ds_research" value="{{ old('ds_research') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Visibilidade </label>
							<div class="col-md-6">
								<select name="cd_research_visibility" class="form-control">
								@foreach($visibility as $v)
								<option value="{{ $v->cd_research_visibility }}"> {{ $v->ds_research_visibility }} </option>
								@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Meta de respostas </label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="nr_answers_to_collect" value="{{ old('nr_asnwers_to_collect') }}">
							</div>
						</div>

						<div class="form-group">
							<Label class="col-md-4 control-label">Data de encerramento </Label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="dt_end_date" value="{{ old('dt_end_date') }}" id="datepicker_final">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tipo da pesquisa</label>
							<div class="col-md-6">
								<select name="cd_research_type" class="form-control">
								@foreach($types as $t)
								<option value="{{ $t->cd_research_type }}"> {{ $t->ds_research_type }} </option>
								@endforeach
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
						
				</div>
			</div>
		</div>
	</div>
	@endif


	@if(old('ds_research'))
	<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dados da pesquisa</div>
						<div class="panel-body">
							
								<table class="table table-stripped table-hover">
									<tr>
										<th>Nome da pesquisa</th>
										<th>
											Status
										</th>
									</tr>
									<tr>
										<td>
											{{ old('ds_research') }}
										</td>
										<td class="alert alert-success text-center">
											<span class="glyphicon glyphicon-ok"></span>
										</td>
									</tr>
								</table>
					    	</div>
				       </div>
			     </div>
	        </div>
	 @endif

	</div>

@endsection