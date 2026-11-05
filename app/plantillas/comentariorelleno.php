<div>
<form name='mensaje' method="POST">
    <!-- Mantenemos el nombre de usuario oculto -->
    <?php if (isset($_REQUEST['nombre'])): ?>
        <input type="hidden" name="nombre" value="<?= htmlspecialchars($_REQUEST['nombre'], ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>
    
    Tema<br>
    <input type="text" name="tema" size="30" placeholder="Introduzca un asunto" 
           value="<?= (isset($_REQUEST['tema']) && $_REQUEST['orden'] !== 'Nueva opinión') ? htmlspecialchars($_REQUEST['tema'], ENT_QUOTES, 'UTF-8') : '' ?>"><br><br>
           
    Comentario: <br>
    <textarea name="comentario" rows="4" cols="50" maxlength="300" placeholder="Introduzca su comentario"><?= (isset($_REQUEST['comentario']) && $_REQUEST['orden'] !== 'Nueva opinión') ? htmlspecialchars($_REQUEST['comentario'], ENT_QUOTES, 'UTF-8') : '' ?></textarea>
    <br><br>
    
    <input type="submit" name="orden" value="Detalles">
    <input type="submit" name="orden" value="Nueva opinión">
    <input type="submit" name="orden" value="Terminar">
</form>
</div>
