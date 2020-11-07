<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>

      <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/productos/insertar" autocomplete="off">
      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Codigo </label>
            <input class="form-control" type="text" id="codigo" name="codigo" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Nombre </label>
            <input class="form-control" type="text" id="nombre" name="nombre" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Unidad </label>
            <select class="form-control" name="IDunidad" id="IDunidad" required>
              <option value="">Seleccionar unidad </option>
              <?php foreach ($unidades as $unidad) { ?>
                <option value=" <?php echo $unidad['id']; ?>" > <?php  echo $unidad['nombre']; ?> </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-12 col-sm-6">
            <label> Categorias </label>
            <select class="form-control" name="IDcategoria" id="IDcategoria" required>
              <option value="">Seleccionar categoria </option>
              <?php foreach ($categorias as $categoria) { ?>
                <option value=" <?php echo $categoria['id']; ?>" > <?php  echo $categoria['nombre']; ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Precio Venta </label>
            <input class="form-control" type="text" id="PrecioVenta" name="PrecioVenta" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Precio Compra </label>
            <input class="form-control" type="text" id="PrecioCompra" name="PrecioCompra" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Stock Minimo </label>
            <input class="form-control" type="text" id="StockMinimo" name="StockMinimo" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Es inventariable </label>
            <select class="form-control" name="inventariable" id="inventariable">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
  </div>
</main>
