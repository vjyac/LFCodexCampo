<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Codex | Campo</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/css/app.v2.css" type="text/css" />
  <link rel="stylesheet" href="/css/font.css" type="text/css" cache="false" />




</head>
<body>
<section class="hbox stretch">
  <!-- .aside -->
  <aside class="bg-dark aside-md" id="nav">
    <section class="vbox">
      <header class="header dker navbar navbar-fixed-top-xs">
        <div class="navbar-header">
          <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i>
          </a>
          <!-- <a href="/" class="navbar-brand" data-toggle="fullscreen"> -->
          <a href="/" class="navbar-brand">
            <img src="/images/logo.png" class="m-r-sm">
            <span class="hidden-nav-xs">Codex S.R.L.</span>
          </a>
          <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i>
          </a>
        </div>
      </header>
      <section class="w-f scrollable">
        <!-- nav -->
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="7px" data-railOpacity="0.2">
          <div class="clearfix wrapper bg-primary nav-user hidden-xs">
            @if (Auth::user())
            <div class="dropdown">
              <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                <!--                   <span class="thumb-sm avatar pull-left m-r-sm">
                <img src="images/avatar.jpg"></span>
              -->
              <span class="hidden-nav-xs clear"></span> <strong>{{ Auth::user()->username }}</strong> <b class="caret caret-white"></b>
              <span class="text-muted text-xs block">{{ Auth::user()->email }}</span>
            </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <span class="arrow top hidden-nav-xs"></span>
            <li>
              <a href="/perfil">Perfil</a>
            </li>
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">0</span>
                Notificaciones
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="/logout">Logout</a>
            </li>
          </ul>
        </div>
        @else
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-nav-xs clear"></span> <strong>Ingresar</strong> <b class="caret caret-white"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <span class="arrow top hidden-nav-xs"></span>
            <li>
              <a href="/login">Login</a>
            </li>
            <li>
              <a href="/users/create">Registrarse</a>
            </li>
          </ul>
        </div>
        @endif
      </div>
      <!-- nav -->
      @if (Auth::user())
      <nav class="nav-primary hidden-xs">
        <ul class="nav">

          <li >
            <a href="#uikit" >
              <i class="fa fa-gears icon"><b class="bg-success"></b></i> 
              <span class="pull-right">
                <i class="fa fa-angle-down text"></i>
                <i class="fa fa-angle-up text-active"></i>
              </span>
              <span>Configuracion</span>
            </a>
            <ul class="nav lt">
            <li >
              <a href="#table" >
                <i class="fa fa-angle-down text"></i>
                <i class="fa fa-angle-up text-active"></i>
                <span>Tablas</span>
              </a>
              <ul class="nav bg">
                          
                <li >
                  <a href="/chofers" >
                    <i class="fa fa-angle-right"></i>
                    <span>Choferes</span>
                  </a>
                </li>
                <li >
                  <a href="/ciudads" >
                    <i class="fa fa-angle-right"></i>
                    <span>Ciudades</span>
                  </a>
                </li>

                <li >
                  <a href="/clientesproveedors" >
                    <i class="fa fa-angle-right"></i>
                    <span>Clientes Proveedores</span>
                  </a>
                </li>

                <li >
                  <a href="/documentostipos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Documentos Tipos </span>
                  </a>
                </li>

                <li >
                  <a href="/establecimientos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Establecimientos</span>
                  </a>
                </li>
                <li >
                  <a href="/grupos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Grupos</span>
                  </a>
                </li>
                <li >
                  <a href="/lotes" >
                    <i class="fa fa-angle-right"></i>
                    <span>Lotes</span>
                  </a>
                </li>

                <li >
                  <a href="/movimientomotivos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Movimientos Motivos</span>
                  </a>
                </li>
                <li >
                  <a href="/productos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Productos</span>
                  </a>
                </li>
                <li >
                  <a href="/productosunidadmedidas" >
                    <i class="fa fa-angle-right"></i>
                    <span>Productos Unidad Medidas</span>
                  </a>
                </li>

                <li >
                  <a href="/provincias" >
                    <i class="fa fa-angle-right"></i>
                    <span>Provincias</span>
                  </a>
                </li>
                <li >
                  <a href="/vehiculos" >
                    <i class="fa fa-angle-right"></i>
                    <span>Vehiculos</span>
                  </a>
                </li>


              </ul>
            </li>

          </ul>
        </li>


      </ul>
    </nav>











      <nav class="nav-primary hidden-xs">
        <ul class="nav">

          <li >
            <a href="#uikit" >
              <i class="fa fa-table icon"><b class="bg-success"></b></i> 
              <span class="pull-right">
                <i class="fa fa-angle-down text"></i>
                <i class="fa fa-angle-up text-active"></i>
              </span>
              <span>Forestaciones</span>
            </a>
            <ul class="nav bg">
              <li >
                <a href="/movimientos" >
                  <i class="fa fa-angle-right"></i>
                    <span>Movimientos</span>
                </a>
              </li>

              <li >
                  <a href="#table" >
                    <i class="fa fa-angle-down text"></i>
                    <i class="fa fa-angle-up text-active"></i>
                    <span>Reportes</span>
                  </a>
                  <ul class="nav bg">
                    <li >
                      <a href="/movimientos/reportes/productoporcontratista" >
                        <i class="fa fa-angle-right"></i>
                        <span>Producto por contratista</span>
                      </a>
                    </li>                
                    <li >
                      <a href="/movimientos/reportes/fleteporproveedor" >
                        <i class="fa fa-angle-right"></i>
                        <span>Flete por proveedor</span>
                      </a>
                    </li>
                    <li >
                      <a href="/movimientos/reportes/productoporcliente" >
                        <i class="fa fa-angle-right"></i>
                        <span>Productos por clientes</span>
                      </a>
                    </li>
                    <li >
                      <a href="/movimientos/reportes/productopororigen" >
                        <i class="fa fa-angle-right"></i>
                        <span>Productos por origen</span>
                      </a>
                    </li>
              </li>


            </ul>
          </li>
        </ul>
      </nav>




      <nav class="nav-primary hidden-xs">
        <ul class="nav">

          <li >
            <a href="#uikit" >
              <i class="fa fa-table icon"><b class="bg-success"></b></i> 
              <span class="pull-right">
                <i class="fa fa-angle-down text"></i>
                <i class="fa fa-angle-up text-active"></i>
              </span>
              <span>Ganaderia</span>
            </a>
            <ul class="nav bg">
              <li >
                <a href="/movimientosganaderias" >
                  <i class="fa fa-angle-right"></i>
                    <span>Movimientos</span>
                </a>
              </li>

              <li >
                  <a href="#table" >
                    <i class="fa fa-angle-down text"></i>
                    <i class="fa fa-angle-up text-active"></i>
                    <span>Reportes</span>
                  </a>
                  <ul class="nav bg">
                    <li >
                      <a href="/movimientosganaderias/reportes/caravanas" >
                        <i class="fa fa-angle-right"></i>
                        <span>Caravanas</span>
                      </a>
                    </li>                
                    <li >
                      <a href="/movimientosganaderias/reportes/fleteporproveedor" >
                        <i class="fa fa-angle-right"></i>
                        <span>Fletes por proveedor</span>
                      </a>
                    </li>                
                    <li >
                      <a href="/movimientosganaderias/reportes/ingresos" >
                        <i class="fa fa-angle-right"></i>
                        <span>Ingresos</span>
                      </a>
                    </li>
                    <li >
                      <a href="/movimientosganaderias/reportes/egresos" >
                        <i class="fa fa-angle-right"></i>
                        <span>Egresos</span>
                      </a>
                    </li>



              </li>


            </ul>
          </li>
        </ul>
      </nav>






    @endif
    <!-- / nav --> </div>
  <!-- / nav -->
</section>
<footer class="footer lt hidden-xs b-t b-dark">
  <div id="chat" class="dropup">
    <section class="dropdown-menu on aside-md m-l-n">
      <section class="panel bg-white">
        <header class="panel-heading b-b b-light">Active chats</header>
        <div class="panel-body animated fadeInRight">
          <p class="text-sm">No active chats.</p>
          <p>
            <a href="#" class="btn btn-sm btn-default">Start a chat</a>
          </p>
        </div>
      </section>
    </section>
  </div>
  <div id="invite" class="dropup">
    <section class="dropdown-menu on aside-md m-l-n">
      <section class="panel bg-white">
        <header class="panel-heading b-b b-light">
          John
          <i class="fa fa-circle text-success"></i>
        </header>
        <div class="panel-body animated fadeInRight">
          <p class="text-sm">No contacts in your lists.</p>
          <p>
            <a href="#" class="btn btn-sm btn-facebook">
              <i class="fa fa-fw fa-facebook"></i>
              Invite from Facebook
            </a>
          </p>
        </div>
      </section>
    </section>
  </div>
  <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
    <i class="fa fa-angle-left text"></i>
    <i class="fa fa-angle-right text-active"></i>
  </a>
  <div class="btn-group hidden-nav-xs">
    <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat">
      <i class="fa fa-comment-o"></i>
    </button>
    <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite">
      <i class="fa fa-facebook"></i>
    </button>
  </div>
</footer>
</section>
</aside>
<!-- /.aside -->
<section id="content">
<section class="vbox">
<section>
  <section class="hbox stretch">
    <section>
      <section class="vbox">

        <section class="scrollable wrapper">
          @if (Session::get('flash_message'))
          <div class="alert alert-warning">{{ Session::get('flash_message') }}</div>
          @endif
          <div class="container">@yield('content')</div>

        </section>
        <footer class="footer bg-white b-t b-light">
          <p>http://www.codexcontrol.com</p>
        </footer>
      </section>
    </section>
    <!-- <aside class="bg-light lter b-l aside-md"></aside>
  -->
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
</section>
<!-- <script src="js/app.v2.js"></script> -->
<!-- Bootstrap -->
<!-- App -->
</body>
</html>