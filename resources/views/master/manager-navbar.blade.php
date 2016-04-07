<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
     data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>
            <li><a href="{{URL::to('admin')}}"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Panel de control</span></a></li>
            <li><a href="{{URL::to('admin/payments')}}"><i class="fa fa-money">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Pagos</span></a>

            </li>
            <li><a href="{{URL::to('admin/loans')}}"><i class="fa fa-credit-card fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Préstamos</span></a>

            </li>
            <li><a href="{{URL::to('admin/customers')}}"><i class="fa fa-users fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Clientes</span></a>

            </li>
            <li><a href="{{URL::to('admin/reports')}}"><i class="fa fa-files-o fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Reportes</span></a>

            </li>

            <li><a href="{{URL::to('admin/applications')}}"><i class="fa fa-file-text fa-fw">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">Solicitudes</span></a>

            </li>
            <li><a href="{{URL::to('admin/contacts')}}"><i class="fa fa-envelope-o fa-fw">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">Contactos</span></a>

            </li>
        </ul>
    </div>
</nav>
