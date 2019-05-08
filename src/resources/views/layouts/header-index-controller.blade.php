<div class="row">
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('empresa.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>
    </div>
    <div class="col-sm-6">
        <form class="" action="{{ route('empresa.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
</div>
