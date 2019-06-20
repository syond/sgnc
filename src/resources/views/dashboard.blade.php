@extends('layouts/layout')

@section('title', 'Dashboard')

@section('content')

		
<h3 id="forms-example" class="">Dashboard</h3>
<hr>

<div class="row">


	<div id="ncChart-div" >
	{!! $chart->container() !!}
	</div> 


	<div id="imediataChart-div" style="height: 300px;">
			
	</div>


	<div id="stocks-div" style="height: 300px;">
			
	</div>
	   

</div>

{!! $chart->script() !!}

@endsection

