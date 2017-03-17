@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
				@if(count($s) == 0)
					<div class="alert alert-danger">Nenhuma Pesquisa Cadastrada!</div>
				@else

				<table class="table table-stripped table-bordered table-hover">
					<tr>
						<th>Pesquisa</th>
						<th class="text-center">Editar</th>
						<th class="text-center">Excluir</th>
						<th class="text-center">Status</th>
					</tr>
					@foreach($s as $survey)
					<tr>
						<td>{{ $survey->ds_research }}</td>

						<td class="text-center">
							<a href="{{ action('ResearchController@edit', $survey->cd_research) }}">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>

						<td class="text-center">
							<a href="{{ action('ResearchController@remove', $survey->cd_research) }}">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>

						@if($survey->cd_research_status == 1)
								<td class="text-center alert alert-info">
								<span class="glyphicon glyphicon-cloud-upload"></span>
								</td>

							@elseif($survey->cd_research_status == 2)
								<td class="text-center alert alert-success">
								<span class="glyphicon glyphicon-ok"></span>
								</td>

							@elseif($survey->cd_research_status == 3)
								<td class="text-center alert alert-danger">
								<span class="glyphicon glyphicon-remove"></span>
								</td>
						@endif
						
					</tr>
					@endforeach
				</table>
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
