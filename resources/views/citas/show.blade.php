
@extends('layouts.template_base')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Citas<small>disponibles para {{ $customer->name }} </small></h2>
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

                    <table class="table table-hover" id="tabla_citas">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Hora</th>
                          <th>Fecha</th>
                          <th>Paciente</th>
                          <th>Cuenta</th>
                          <th>Contrato</th>
                          <th>Tratamiento</th>
                          <th>Observación</th>                          
                          <th>Doctor</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($cont=1)
                        @foreach( $quotes as $quote )
                          <tr>
                            <th scope="row"> {{ $cont++ }} </th>
                            <td> {{ $quote->hour }} </td>
                            <td> {{ $quote->date }} </td>
                            <td>
                              @if( isset( $quote->customer ) )
                                <a href=" {{ route('clientes.show',$quote->customer->id) }} "> {{ $quote->customer->name }} </a>
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                            <td id="td_trat_{{$quote->id}}"> {{ $quote->treatment }} </td>
                            <td> {{ $quote->observation }} </td>
                            <td> {{ $quote->doctor->full_name }} </td>
                            <td> 
                              @switch( $quote->status )
                                @case('Disponible')
                                  <label class="label label-info">Disponible</label> 
                                  @break                              
                                @case('Completado')
                                  <label class="label label-success">Completado</label> 
                                  @break
                                @case('No llego')
                                  <label class="label label-danger">No llego</label> 
                                  @break
                                @case('Pendiente')
                                  <label class="label label-primary">Pendiente</label> 
                                  @break
                              @endswitch
                            </td>
                            <td>
                              @if( isset( $quote->customer ) )
                                <a href="#" class="btn btn-success btn-xs" id="{{$quote->id.'-'.$customer->id}}" onclick="updateQuote(this.id)">
                                  <i class="fa fa-pencil"></i>
                                </a>
                              @else
                                <a href="#" class="btn btn-primary btn-xs" id="{{$quote->id.'-'.$customer->id}}" onclick="launchModal(this.id)">
                                  <i class="fa fa-plus"></i> 
                                </a>                              
                              @endif
                              <a href="#" class="btn btn-danger btn-xs" id="{{$quote->id}}" onclick="deleteQuote(this.id)"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>                         
                        @endforeach

                      </tbody>
                    </table>

                    <div class="ln_solid"></div>
                    <!--<button class="btn btn-primary" type="button">Cancelar</button>-->
                    <a href=" {{ route('citas.create') }} " class="btn btn-primary"><i class="fa fa-reply"></i> Regresar</a>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript">

          function launchModal(id){
            $('#modal').modal('show');
            console.log( id );
            $("#marco").attr("id", id);
          }

          function saveQuote(id){

            var trat = $('#tratamiento').val();
            var obs  = $('#observacion').val();

            $.ajax({
                type:'POST',
                url: "/actualizar_cita",
                dataType: 'JSON',
                data:{ _token: "{{ csrf_token() }}",
                       tratamiento: trat,
                       observacion: obs,
                       id_row: id,
                },
                success: function( msg ) {
                  console.log( msg );
                },
                error: function( error ){

                },
            });

            $('#modal').modal('hide'); 

            location.reload(); 

          }

          function updateQuote(id){

            $.ajax({
                type:'POST',
                url: "/buscar_cita",
                dataType: 'JSON',
                data:{ _token: "{{ csrf_token() }}",
                       quote_id: id,
                },
                success: function( msg ) {
                  console.log( msg );
                  $('#tratamiento').val( msg['treatment'] );
                  $('#observacion').val( msg['observation'] );                  
                },
                error: function( error ){

                },
            });



            console.log(id);

            $('#modal').modal('show');
            $("#marco").attr("id", id);

          }          

          function deleteQuote(id){

            if( confirm('¿Esta seguro que desea eliminar esta cita?') ){
              $.ajax({
                  type:'POST',
                  url: "/eliminar_cita",
                  dataType: 'JSON',
                  data:{ _token: "{{ csrf_token() }}",
                         quote_id: id,
                  },
                  success: function( msg ) {
                    console.log( msg );
                  },
                  error: function( error ){

                  },
              });

              $('#modal').modal('hide');

              location.reload();              
            }



          }

          function cancel(){
            location.reload(); 
          }
        </script>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="data-form">
                  <div class="form-group">
                    <label for="campo" class="col-form-label">Tratamiento</label>
                    <input type="text" class="form-control" id="tratamiento" required>
                  </div>
                  <div class="form-group">
                    <label for="campito" class="col-form-label">Observacion</label>
                    <textarea class="form-control" id="observacion" required></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Cerrar</button>
                <button id="marco" type="button" class="btn btn-primary" onclick="saveQuote(this.id)">Guardar</button>
              </div>
            </div>
          </div>
        </div>

@endsection