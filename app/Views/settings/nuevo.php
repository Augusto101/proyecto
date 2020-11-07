<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/configuracion/insertar" autocomplete="off">
      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Nombre </label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Nombre Corto </label>
            <input class="form-control" type="text" id="NombreCorto" name="NombreCorto" value="<?php echo set_value('NombreCorto'); ?>" required/>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
  </div>
</main>
