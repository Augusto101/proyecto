<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/usuarios/insertar" autocomplete="off">
      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Usuario </label>
            <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo set_value('usuario'); ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Nombre  </label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Contraseña </label>
            <input class="form-control" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Repite Contraseña  </label>
            <input class="form-control" type="password" id="repassword" name="repassword" value="<?php echo set_value('repassword'); ?>" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Rol </label>
            <select class="form-control" name="IDrol" id="IDrol" required>
              <option value="">Seleccionar Rol </option>
              <?php foreach ($roles as $rol) { ?>
                <option value=" <?php echo $rol['id']; ?>" > <?php  echo $rol['nombre']; ?> </option>
              <?php } ?>
            </select>
          </div>

        </div>
      </div>

      <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
  </div>
</main>
