@extends('app')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Minhas Perguntas</div>

						<div class="panel-body">
						@if(count($p) == 0)
							<div class="alert alert-danger">Nenhuma Pergunta Cadastrada!</div>
						@else

						<table class="table table-stripped table-bordered table-hover">
							<tr>
								<th>Pergunta</th>
								<th>Tipo</th>
								<th class="text-center">Editar</th>
							</tr>
							@foreach($p as $pergunta)
							<tr>
								<td>{{ $pergunta->ds_research_question }}</td>
								<td>{{ $pergunta->ds_question_type }}</td>

								<td class="text-center">
									<a href="{{ action('QuestionController@edit', $pergunta->cd_research_question) }}">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
								</td>

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