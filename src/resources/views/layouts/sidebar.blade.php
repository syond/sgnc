<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
				 <li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
				                   
                    <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Administrador</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graficos.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Graficos</a></li>
                            
							<li><a href="{{ url('admin/funcionario') }}" class=" hvr-bounce-to-right"><i class="fa fa-save nav_icon"></i>Cadastrar Funcionário</a></li>
							<li><a href="{{ url('admin/onibus') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ônibus</a></li>
							<li><a href="{{ url('admin/equipamento') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Equipamento</a></li>
							<li><a href="{{ url('admin/empresa') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Empresa</a></li>
							<li><a href="{{ url('admin/setor') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Setor</a></li>							
					   </ul>
                    </li>
					               
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Técnico</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('tecnico/acao-imediata') }}" class=" hvr-bounce-to-right"> <i class="fa fa-file-o nav_icon"></i>Ação Imediata</a></li>
							<li><a href="{{ url('tecnico/acao-corretiva') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ação Corretiva</a></li>
							<li><a href="{{ url('tecnico/nao-conformidade') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Não Conformidade</a></li>
                       </ul>
                    </li>
                    <li>
                        <a href="{{ url('relatorio') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Relatório</span> </a>
                    </li>
                           
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Configurações</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('logout') }}" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Logout</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
			</div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
  </div>