<form class="navbar-left-right" action="{{ route('empresa.search') }}">
    <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
    <input type="submit" value="" class="fa fa-search">
</form>

<div class="row">
    <div class="col-md-4">
        <form class="text-right" action="{{ route('empresa.create') }}">
            <button class="btn btn-success">Cadastrar</button>
        </form>
    </div>
    <div class="col-md-4">
        <select name="" class="form-control">
            <option value="0"></option>
        </select>
    </div>
</div>