@extends('layouts/layout')

@section('title', 'Dashboard')

@section('content')

		
<h3 id="forms-example" class="">Dashboard</h3>
<hr>

<div class="row">

	<div class="col-sm-6">
			{!! $nao_conformidade_chart->container() !!}
	</div> 
	   

</div>

{!! $nao_conformidade_chart->script() !!}

@endsection

