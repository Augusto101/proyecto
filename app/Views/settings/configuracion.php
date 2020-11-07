<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/configuracion/actualizar" autocomplete="off">

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Nombre de la tienda </label>
            <input class="form-control" type="text" id="TiendaNombre" name="TiendaNombre" value="<?php echo $nombre['valor']; ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> RTU </label>
            <input class="form-control" type="text" id="TiendaRtu" name="TiendaRtu" value="<?php echo $rtu['valor']; ?>" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Telefono de la tienda </label>
            <input class="form-control" type="text" id="TiendaTelefono" name="TiendaTelefono" value="<?php echo $telefono['valor']; ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> correo de la tienda </label>
            <input class="form-control" type="text" id="TiendaEmail" name="TiendaEmail" value="<?php echo $email['valor']; ?>" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Direccion de la tienda </label>
            <textarea class="form-control" name="TiendaDireccion" id="TiendaDireccion" required> <?php echo $direccion['valor']; ?> </textarea>
          </div>
          
          <div class="col-12 col-sm-6">
            <label> Mensaje de la tienda </label>
            <textarea class="form-control" name="TiendaMensaje" id="TiendaMensaje" required> <?php echo $mensaje['valor']; ?> </textarea>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/configuracion" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
</div>
</main>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> ¿Desea eliminar este Registro? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
        <a class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>
