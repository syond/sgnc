    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                    
                <li>
                    <a href="{{ url('dashboard') }}" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                </li>
                                    
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Administrador</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graficos.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Graficos</a></li>
                            <li><a href="{{ url('admin/funcionario') }}" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>Funcionário</a></li>
                            <li><a href="{{ url('admin/onibus') }}" class=" hvr-bounce-to-right"><i class="fa fa-bus nav_icon"></i>Ônibus</a></li>
                            <li><a href="{{ url('admin/equipamento') }}" class=" hvr-bounce-to-right"><i class="fa fa-cogs nav_icon"></i>Equipamento</a></li>
                            <li><a href="{{ url('admin/empresa') }}" class=" hvr-bounce-to-right"><i class="fa fa-building nav_icon"></i>Empresa</a></li>
                            <li><a href="{{ url('admin/setor') }}" class=" hvr-bounce-to-right"><i class="fa fa-briefcase nav_icon"></i>Setor</a></li>							
                        </ul>
                </li>
                                    
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Técnico</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('tecnico/nao-conformidade') }}" class=" hvr-bounce-to-right"><i class="fa fa-tasks nav_icon"></i>Não Conformidade</a></li>
                            <li><a href="{{ url('tecnico/acao-imediata') }}" class=" hvr-bounce-to-right"> <i class="fa fa-clipboard nav_icon"></i>Ação Imediata</a></li>
                            <li><a href="{{ url('tecnico/acao-corretiva') }}" class=" hvr-bounce-to-right"><i class="fa fa-check nav_icon"></i>Ação Corretiva</a></li>       
                        </ul>
                </li>
                   
                <li><a href="{{ url('rnc') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i>RNC</a></li>            

            </ul>
        </div>
    </div>
</nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">
        </div>