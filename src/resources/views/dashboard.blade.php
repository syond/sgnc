@extends('layouts/layout')

@section('title', 'Dashboard')

@section('content')

		
<h3 id="forms-example" class="">Dashboard</h3>
<hr>

<div class="row">
	

	<div id="total" class="col-md-12">
		{!! $totalAcoes->container() !!}
	</div> 


	<div id="stocks-div" style="height: 300px;">
			
	</div>
	   

</div>

{!! $totalAcoes->script() !!}

@endsection

