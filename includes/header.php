<?php if( isset($pdo_errores) && strlen($pdo_errores)>0) : ?>
<div class="contenedor bg-danger">
    <div class="fila">
        <div class="columna-12">
            <h3>¡ERROR!</h3>
            <p><?php echo $pdo_errores; ?></p>
        </div>
    </div>
</div>
<?php endif; ?>

<div id="wrapper-msg-success" class="contenedor bg-success displayNone">
    <div class="fila">
        <div class="columna-12">
            <h3>¡EXCELENTE!</h3>
            <p id="msg-success"></p>
        </div>
    </div>
</div>
