
@extends('layouts.template_base')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Citas</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Apellidos..." disabled>
                    <span class="input-group-btn">
                      <button class="btn btn-default" onclick="window.location.href='search.html'" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                <!-- add customer -->
                @if( session('info') )
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Proceso completo</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="alert alert-success">
                          <h4><i class="fa fa-check"></i> Nuevo cliente agregado</h4>
                          <p> Ver perfil <a href=" {{ route('clientes.show',  session('info') ) }} " class="alert-link">aquí.</a> </p>
                        </div>
                    </div>
                  </div>
                @endif
                <!-- end add customer -->


                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recomendaciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!--<h4>Campos obligatorios<small> </small></h4>-->
                    <div>
                      Realiza la busqueda para seleccionar el paciente a agendar.
                    </div>
                  </div>
                </div>


                <!-- star errors -->
                @if( count( $errors ) )
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Datos obligatorios</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <!-- <h4>Campos obligatorios<small> </small></h4> -->
                      <p> Por favor ingresa los siguientes datos: </p>
                      <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )
                          <li> {{ $error }} </li>
                        @endforeach
                      </div>
                    </div>
                  </div>
                @endif
                <!-- end errors -->

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos <small> Ingresa la informacion solicitada</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    {!!Form::open(['route'=>'buscar_paciente','files' => true])!!}
                      @include('citas.partials.form')
                    {!!Form::close()!!}

                  </div>
                </div>


              </div>
            </div>


            @if( isset( $customers ) )
              <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Citas para mañana<small></small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                          @php($cont=1)
                          @foreach($customers as $customer)
                            <tr>
                              <th scope="row"> {{ $cont++ }} </th>
                              <td>
                                <a href=" {{ route('clientes.show', $customer->id) }} "> 
                                  {{ $customer->last_name_one . ' ' . $customer->last_name_two . ' ' . $customer->name }} 
                                </a>
                              </td>
                              <td>
                                <a href=" {{ route('buscar_fecha', $customer->id) }} " class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Agendar </a>
                              </td>
                            </tr>                           
                          @endforeach

                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>            
            @endif

          </div>
        </div>
        <!-- /page content -->

@endsection