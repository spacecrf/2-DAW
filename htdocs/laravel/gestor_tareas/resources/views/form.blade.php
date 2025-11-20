    <form action="" method="POST" enctype="multipart/form-data">
        <label>NIF/CIF:</label><br>
        <input type="text" name="nif_cif" value="{{ $nif_cif }}"><br>
        {!! \App\Models\Funciones::verErrores('nif_cif') !!}
        <br>

        <label>Persona de contacto:</label><br>
        <input type="text" name="persona_contacto" value="{{ $persona_contacto }}"><br>
        {!! \App\Models\Funciones::verErrores('persona_contacto') !!}
        <br>
        <label>Teléfono:</label><br>
        <input type="text" name="telefono_contacto" value="<?= htmlspecialchars($telefono_contacto) ?>"><br>
             {!! \App\Models\Funciones::verErrores('telefono_contacto') !!}
        <br>

        <label>Correo electrónico:</label><br>
        <input type="text" name="correo_contacto" value="<?= htmlspecialchars($correo_contacto) ?>"><br>
        {!! \App\Models\Funciones::verErrores('correo_contacto') !!}
        <br>

        <label>Descripción de la tarea:</label><br>
        <textarea name="descripcion"><?= htmlspecialchars($descripcion) ?></textarea><br>
        {!! \App\Models\Funciones::verErrores('descripcion') !!}   
        <br>
        <!-- Preguntar como funciona lo de los errores -->
         
        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= htmlspecialchars($direccion) ?>"><br><br>

        <label>Población:</label><br>
        <input type="text" name="poblacion" value="<?= htmlspecialchars($poblacion) ?>"><br><br>

        <label>Código Postal:</label><br>
        <input type="text" name="codigo_postal" value="<?= htmlspecialchars($codigo_postal) ?>"><br><br>

        <label>Provincia:</label><br>
        <select name="provincia">
            <option value="">Seleccione provincia</option>
            <?php \App\Models\Funciones::mostrarProvincias($provincias) ?>
        </select><br>
        {!! \App\Models\Funciones::verErrores('provinciaSeleccionada') !!}
        <br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="B" <?= $estadoTarea == "B" ? "selected" : "" ?>>Esperando ser aprobada</option>
            <option value="P" <?= $estadoTarea == "P" ? "selected" : "" ?>>Pendiente</option>
            <option value="R" <?= $estadoTarea == "R" ? "selected" : "" ?>>Realizada</option>
            <option value="C" <?= $estadoTarea == "C" ? "selected" : "" ?>>Cancelada</option>
        </select><br><br>

        <label>Operario encargado:</label><br>
        <select name="operario_encargado">
            <option value="">Seleccione operario</option>
            <option value="Juan Pérez" <?= $operarioEncargado == "Juan Pérez" ? "selected" : "" ?>>Juan Pérez</option>
            <option value="María López" <?= $operarioEncargado == "María López" ? "selected" : "" ?>>María López</option>
            <option value="Carlos Ruiz" <?= $operarioEncargado == "Carlos Ruiz" ? "selected" : "" ?>>Carlos Ruiz</option>
            <option value="Ana María Fernández" <?= $operarioEncargado == "Ana María Fernández" ? "selected" : "" ?>>Ana María Fernández</option>
            <option value="Sara Martínez" <?= $operarioEncargado == "Sara Martínez" ? "selected" : "" ?>>Sara Martínez</option>
            <option value="Lucía Hurtado" <?= $operarioEncargado == "Lucía Hurtado" ? "selected" : "" ?>>Lucía Hurtado</option>
        </select><br><br>

        <label>Fecha de realización:</label><br>
        <input type="date" name="fecha_realizacion" value="<?= htmlspecialchars($fecha_realizacion) ?>"><br>
        {!! \App\Models\Funciones::verErrores('fecha_realizacion') !!}
        <br>

        <label for="anotacionesAnteriores">Anotaciones anteriores:</label><br>
        <textarea id="anotaciones_anteriores" name="anotaciones_anteriores"><?= htmlspecialchars($anotaciones_anteriores) ?></textarea><br><br>

        <label for="fichero_resumen">Fichero resumen:</label>
        <input type="file" id="fichero_resumen" name="fichero_resumen"><br><br>

        <label for="fotos">Fotos del trabajo:</label>
        <input type="file" id="fotos" name="fotos[]" multiple><br><br>

        <a class="btn btn-cancel" href="{!! url('/') !!}">Cancelar</a>  <input type="submit" value="Crear tarea">
    </form>