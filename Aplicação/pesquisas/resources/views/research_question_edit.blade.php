@extends('app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel panel-heading">Editar Pergunta</div>

					<div class="panel-body">
						@if(empty(array($question[0])) == 0)
							<div class="alert alert-danger text-center">Pergunta não encontrada</div>
						@else

							<form class="form-horizontal" role="form" method="POST" action="{{ action('QuestionController@update', $question->cd_research_question) }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="cd_research_question" value="{{ $question->cd_research_question }}">
							<input type="hidden" name="cd_user" value="{{ Auth::user()->id }}">

							<div class="form-group">
								<label class="col-md-4 control-label">Pergunta </label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="ds_research_question" value="{{ $question->ds_research_question }}">
								</div>	
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tipo de pergunta</label>
								<div class="col-md-6">
									<select name="cd_question_type" class="form-control">
										@foreach($question as $pergunta)
											<option value="{{ $pergunta->cd_question_type }}"> {{ $pergunta->ds_question_type }} </option>
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
						@endif
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection