@extends('layouts/layout')

@section('title', 'Dashboard')

@section('content')

		
<h3 id="forms-example" class="">Dashboard</h3>
<hr>
<div class="row">
    <div class="col-sm-6">

		<label for="equipamento_id">Tipo de Ação</label>
		<select name="equipamento_id" id="equipamento_id" class="form-control">
			<option value="" disabled selected></option>
        	<option value="">Ação Imediata</option>
			<option value="">Ação Corretiva</option>
			<option value="">Não Conformidade</option>
        </select>

		<label for="equipamento_id">Data</label>
		<input type="date" name="equipamento_id" id="equipamento_id" class="form-control">

		<label for="equipamento_id">Técnico Responsável</label>
		<select name="equipamento_id" id="equipamento_id" class="form-control">
			<option value="" disabled selected></option>
        	<option value="">Jhonatan Alves</option>
			<option value="">Gabriel Corrêa</option>
			<option value="">Bruna de Oliveira</option>
        </select>

		<label for="equipamento_id">Situação</label>
		<select name="equipamento_id" id="equipamento_id" class="form-control">
			<option value="" disabled selected></option>
        	<option value="">Pendente</option>
			<option value="">Em andamento</option>
			<option value="">Encerrado</option>
        </select>

    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>Ações</h4>
        </div><br>
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">Serial Equipamento</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Data</th>
            <th scope="col">Status</th>
        </tr>
    </thead>        
    <tbody>

       
        <tr>
            <td>12</td>
			<td>Reparo em cabo de vídeo</td>
			<td>SVR800M926</td>
			<td>580</td>
			<td>2019-05-30</td>
            <td>Pendente</td>
		</tr>
		<tr>
			<td>13</td>
			<td>Reparo em cabo de vídeo</td>
			<td>JJE12347</td>
			<td>689</td>
			<td>2019-05-30</td>
            <td>Em andamento</td>
		</tr>
		<tr>
			<td>14</td>
			<td>Reparo em cabo de vídeo</td>
			<td>BRV8596</td>
			<td>230</td>
			<td>2019-05-30</td>
            <td>Encerrado</td>
        </tr>         
      
    </tbody>
</table>
<div class="text-center">
    
</div>


@endsection

