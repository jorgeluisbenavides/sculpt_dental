
    <div class="row">

      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <!--<input type="text" placeholder="Apellido Paterno *" class="form-control">-->
        {{ Form::text('last_name_one', null, ['class'=>'form-control text-capitalize','placeholder'=>'Apellido Paterno' , 'id'=>'last_name_one']) }}
      </div> 

      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <!--<input type="text" placeholder="Apellido Materno *" class="form-control">-->
        {{ Form::text('last_name_two', null, ['class'=>'form-control text-capitalize','placeholder'=>'Apellido Materno' , 'id'=>'last_name_two']) }}
      </div>                                        

      <div class="col-md-3 col-sm-4 col-xs-12 form-group has-feedback">
        <!--<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre *">-->
        {{ Form::text('name', null, ['class'=>'form-control has-feedback-left text-capitalize','placeholder'=>'Nombre' , 'id'=>'name']) }}
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-12 form-group has-feedback">
        <!--<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Folio">-->
        {{ Form::text('folio', null, ['class'=>'form-control has-feedback-left','placeholder'=>'Folio' , 'id'=>'folio']) }}
        <span class="fa fa-folder-o form-control-feedback left" aria-hidden="true"></span>
      </div>

    </div>

    <div class="ln_solid"></div>

    <!--<button class="btn btn-primary" type="button">Cancelar</button>-->
    <button class="btn btn-primary" type="reset">Limpiar</button>
    <button type="submit" class="btn btn-success">Buscar</button>
