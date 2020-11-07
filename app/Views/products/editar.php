<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $titulo; ?> </h1>
      <?php \Config\Services::validation()->listErrors(); ?>

    <form  method="post" action = "<?php  echo base_url(); ?>/productos/actualizar" autocomplete="off">
      <?php csrf_field(); ?>

      <input type="hidden" id="id" name="id"  value="<?php echo $producto['id']; ?>" />

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Codigo </label>
            <input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $producto['codigo']; ?>" autofocus required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Nombre </label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required/>
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
                <option value=" <?php echo $unidad['id']; ?>"  <?php if($unidad['id']== $producto['IDunidad']) { echo 'selected'; }  ?> > <?php  echo $unidad['nombre']; ?> </option>
              <?php } ?>
            </select>

          </div>

          <div class="col-12 col-sm-6">
            <label> Categorias </label>
            <select class="form-control" name="IDcategoria" id="IDcategoria" required>
              <option value="">Seleccionar categoria </option>
              <?php foreach ($categorias as $categoria) { ?>
                <option value=" <?php echo $categoria['id']; ?>" <?php if($categoria['id']== $producto['IDcategoria']) { echo 'selected'; }  ?> > <?php  echo $categoria['nombre']; ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Precio Venta </label>
            <input class="form-control" type="text" id="PrecioVenta" name="PrecioVenta" value="<?php echo $producto['PrecioVenta']; ?>" required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Precio Compra </label>
            <input class="form-control" type="text" id="PrecioCompra" name="PrecioCompra" value="<?php echo $producto['PrecioCompra']; ?>" required/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label> Stock Minimo </label>
            <input class="form-control" type="text" id="StockMinimo" name="StockMinimo" value="<?php echo $producto['StockMinimo']; ?>" required/>
          </div>

          <div class="col-12 col-sm-6">
            <label> Es inventariable </label>
            <select class="form-control" name="inventariable" id="inventariable" >
              <option value="1"  <?php if($producto['inventariable']== 1) { echo 'selected'; } ?> >Si</option>
              <option value="0" <?php if($producto['inventariable']== 0) { echo 'selected'; } ?> >No</option>
            </select>
          </div>
        </div>
      </div>

      <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary" >Regresar</a>
      <button type="submit" name="button" class="btn btn-success" >Guardar</button>
    </form>
  </div>
</main>
