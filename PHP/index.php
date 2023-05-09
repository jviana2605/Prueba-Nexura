<?php include 'views/layout/header.php' ?>
<?php
include 'config/db.php';
$con = connection();

$sql = "SELECT empleado.id, empleado.nombre AS nombre_empleado, empleado.sexo,empleado.email, empleado.sexo, empleado.area_id, empleado.boletin, empleado.descripcion, areas.nombre AS nombre_area FROM `empleado` JOIN areas ON areas.id = empleado.area_id;";
$query = mysqli_query($con, $sql);

$sql = "SELECT * FROM areas";
$areas = mysqli_query($con, $sql);
?>
<!-- enviar a Create en el modelo -->

<?php
				include_once ("models/empleado.php");
				$empleados = new Empleado();
				if(isset($_POST) && !empty($_POST)){

                    $nombre = $empleados->sanitize($_POST['nombre']);
                    $email = $empleados->sanitize($_POST['email']);
                    $sexo = $empleados->sanitize($_POST['sexo']);
                    $area_id = $empleados->sanitize($_POST['area_id']);
                    $descripcion = $empleados->sanitize($_POST['descripcion']);
                    $role = $empleados->sanitize($_POST['check1']);
					
					$res = $empleados->create(
						$nombre,
                        $email,
                        $sexo,
                        $area_id,
                        $descripcion,
                        $role
					);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alerta alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alerta alert-danger";
					}
                    
					?>
                    	<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>

        	

<div class="container">
    <div class="alerta">
        Los campos asteriscos(*) son obligatorios
    </div>
    <div class="row">
        <form method="post" class="formulario">
            <div class="col-md-7">
                <label for="">Nombre Completo *</label>
                <input type="text" name="nombre" require placeholder="Nombre">
            </div>
            <div class="col-md-7">
                <label for="">Correo electronico *</label>
                <input type="email" name="email" require placeholder="Correo">
            </div>
            <div class="col-md-7 radios">
                <h4>Sexo*</h4>
                <div class="general-radios">
                    <div class="contenido-radios">
                        <input type="radio" name="sexo" value="M">Masculino
                    </div>
                    <div class="contenido-radios">
                        <input type="radio" name="sexo" value="F">Femenino
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <label for="">Área *</label>
                <select name="area_id">
                    <?php while ($row = mysqli_fetch_array($areas)) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-7">
                <label for="">Descripción *</label>
                <textarea name="descripcion"></textarea>
            </div>
            <div class="col-md-7">
                <label for="">Roles *</label>
                <div class="container-checks">
                    <div class="item-check">
                    <input type="checkbox" name="check1" value="Deseo Recibir boletin informativo"><span>Deseo Recibir boletin informativo</span> 
                    </div>
                    <div class="item-check">
                        <input type="checkbox" name="check1" value="profesional de proyectos - Desarrolador"><span>profesional de proyectos - Desarrolador</span> 
                    </div>
                    <div class="item-check">
                        <input type="checkbox" name="check1" value="Gerente estrategico"><span>Gerente estrategico</span>   
                   </div>
                   <div class="item-check">
                   <input type="checkbox" name="check1" value="Auxiliar administrativo"><span>Auxiliar administrativo</span>
                   </div>
                </div>
                
            </div>
            <input type="submit" value="Guardar">
        </form>

        

        <!-- INICIO LISTA -->
        <div class="lista">
            <h2>Lista de empleados</h2>
            <table>
                <thead>
                    <tr class="titles-table">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th>Area</th>
                        <th>Boletin</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)) : ?>
                        <tr class="list-table">
                            <th> <?= $row['nombre_empleado'] ?> </th>
                            <th> <?= $row['email'] ?> </th>
                            <th> <?= $row['sexo'] ?> </th>
                            <th> <?= $row['nombre_area'] ?> </th>
                            
                            <th> <?= $row['boletin'] ?> </th>
                            <th><a href="#">Editar</a></th>
                            <th><a href="#">Eliminar</a></th>
                          

                         
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
                        <!-- scrip para eliminar -->
<!--                         <script>
    const botonesEliminar = document.querySelectorAll('.eliminar');
    botonesEliminar.forEach((boton) => {
        boton.addEventListener('click', (evento) => {
            const idProducto = evento.currentTarget.dataset.id;
            const url = `eliminar.php?id=${idProducto}`;
            fetch(url)
                .then((response) => {
                    if(response.ok) {
                        window.location.reload();
                    }
                });
        });
    });
</script> -->
    </div>
</div>

<?php include 'views/layout/footer.php' ?>