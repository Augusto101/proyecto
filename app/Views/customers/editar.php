<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/clientes/actualizar" autocomplete="off">

      <input type="hidden" id="id" name="id"  value="<?php echo $cliente['id']; ?>" />

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Nombre </label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Direccion </label>
            <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $cliente['direccion']; ?>" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Telefono </label>
            <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" />
          </div>

          <div class="col-12 col-sm-6">
            <label> Correo </label>
            <input class="form-control" type="text" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>"/>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
  </div>
</main>
