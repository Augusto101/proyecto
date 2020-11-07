<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/usuarios/cambiaPassword" autocomplete="off">

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Usuario </label>
            <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo $usuario['usuario']; ?>" disabled/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Nombre </label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>" disabled/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Contraseña </label>
            <input class="form-control" type="password" id="password" name="password"  required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Confimar Contraseña </label>
            <input class="form-control" type="password" id="repassword" name="repassword"  required/>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>

      <?php if(isset($mensaje)){ ?>
        <div class="alert alert-success">
          <?php echo $mensaje; ?>
        </div>
      <?php } ?>

    </form>
  </div>
</main>
