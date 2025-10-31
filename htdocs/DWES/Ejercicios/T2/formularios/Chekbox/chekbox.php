<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $errores=[];
        if($_POST){
            echo "<p>Resultado enviado:";
            if($_POST['nombre']==''){
                $errores['nombre']='falta el nombre';
            }
            if(!isset($_POST['extras'])){
                $errores['extras']='falta seleccionar al menos 1 opcion';
            }
            if($errores){
                foreach($errores as $error){
                    echo "<p>$error";
                }
                echo "</div>";
                formulario();
            }else{
                echo "<p>Datos recividos";
                print_r($_POST);
            }
            
        }else{
            //Es la 1º vez
            formulario();
        }


        function formulario() {
        ?>
        <form method="post">
        <input type="text" name="nombre" value="<?=filter_input(INPUT_POST ,'nombre') ?>"/>
        <br>
        <input type="checkbox" name="extras[0]" value="garaje" <?=estaMarcado('garaje')?> > Garaje
        <br>
        <input type="checkbox" name="extras[1]" value="piscina" <?=estaMarcado('piscina')?> > Piscina
        <br>
        <input type="checkbox" name="extras[2]" value="jardin" <?=estaMarcado('jardin')?> > Jardin
        <br>
        <button type="submit">Enviar</button>
        </form>
        <?php
        }

        function estaMarcado(string $value){
            $opcionesMarcadas = isset($_POST['extras']) ? $_POST['extras'] : [];
            if($opcionesMarcadas){
                if(in_array($value, $opcionesMarcadas)){
                    return "cheked";
                }
                return "";
            }
        }

        ?>
    </form>
</body>
</html>