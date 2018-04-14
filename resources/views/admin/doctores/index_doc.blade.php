
@extends('layouts.template_base')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Doctores</h3>
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
                    <h4>Campos obligatorios<small> </small></h4>
                    <div>
                      Los campos marcados con <strong>*</strong> son obligatorios, sin ellos no podras agregar el cliente.
                    </div>
                    <p>En caso que se ingrese algun dato erroneo se puede editar, sin necesidad de volver a crear otro registro.</p>
                  </div>
                </div>

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

                    <form class="form-horizontal form-label-left">

                      <div class="row">

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre *">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <!--<div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <input type="text" placeholder="Nombre" class="form-control">
                        </div>-->

                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <input type="text" placeholder="Apellido Paterno *" class="form-control">
                        </div> 

                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <input type="text" placeholder="Apellido Materno *" class="form-control">
                        </div>  

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <textarea class="form-control" placeholder="Especialidad *"></textarea>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <textarea class="form-control" placeholder="Escuela de procedencia *" ></textarea>
                        </div>                        

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Telefono casa">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control" id="inputSuccess2" placeholder="Telefono celular">
                        </div> 
      
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <select class="form-control">
                            <option>MASCULINO</option>
                            <option>FEMENINO</option>
                          </select>
                        </div>                                                                    

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <label>Foto del cliente</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="archivitos">
                        </div>

                        
                      </div>


                      <div class="ln_solid"></div>

                      <!--<button class="btn btn-primary" type="button">Cancelar</button>-->
                      <button class="btn btn-primary" type="reset">Limpiar</button>
                      <button type="submit" class="btn btn-success">Agregar</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

@endsection