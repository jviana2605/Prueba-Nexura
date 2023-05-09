<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Técnica - Desarrollador PHP</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div col-md>
                <header>
                    <h3>Crear empleado</h3>
                </header>
            </div>
        </div>
    </div>
    <div class="alerta">
        Los campos asteriscos(*) son obligatorios
    </div>
    <form action="#" method="POST" enctype="multipart/form-data" class="formulario">
        {{ csrf_field() }}

        <div class="col-md-7">
            <label for="">Nombre Completo *</label>
            <input type="text" name="Nombre" require placeholder="Nombre">
        </div>

        <div class="col-md-7">
            <label for="">Correo electronico *</label>
            <input type="email" name="email" require placeholder="Correo">
        </div>

        <div class="col-md-7 radios">
            <h4>Sexo*</h4>
            <div class="general-radios">
                <div class="contenido-radios">
                    <input type="radio" name="sexo" value="Masculino">Masculino
                </div>
                <div class="contenido-radios">
                    <input type="radio" name="sexo" value="Femenino">Femenino
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <label for="">Área *</label>
            <select name="area">
               
            </select>
        </div>
        <div class="col-md-7">
            <label for="">Descripción *</label>
            <textarea name="Descripcion"></textarea>
        </div>
        <div class="col-md-7">
            <label for="">Roles *</label>
            <div class="container-checks">
                <div class="item-check">
                <input type="checkbox" name="check1" ><span>Deseo Recibir boletin informativo</span> 
                </div>
                <div class="item-check">
                    <input type="checkbox" name="check1"><span>profesional de proyectos - Desarrolador</span> 
                </div>
                <div class="item-check">
                    <input type="checkbox" name="check1"><span>Gerente estrategico</span>   
               </div>
               <div class="item-check">
               <input type="checkbox" name="check1"><span>Auxiliar administrativo</span>
               </div>
            </div>
            
        </div>
        <input type="submit" value="Guardar">

    </form>



    <footer class="container">
        <div row>
            <div col-md>
                Desarrollado por Jesús Viana
            </div>
        </div>
    </footer>
</body>

</html>
