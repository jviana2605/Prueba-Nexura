<?php 


class Empleado{
    
    private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="nexura";
        function __construct(){
			$this->connect_db();
		}
        public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}

        public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return; 
		}

        public function create(
			$nombre,
			$email,
			$sexo ,
			$area_id ,
			$descripcion,
            $role
			){
                /* Primera sentencia */
			$sql_empleados = "INSERT INTO `empleado` (
				nombre,
                email,
                sexo,
                area_id,
                descripcion)
                VALUES (
                    '$nombre',
                    '$email',
                    '$sexo',
                    '$area_id',
                    '$descripcion'
				)";

                 /* segunda sentencia */
             $sql_empleado_rol = "INSERT INTO `roles` (
				nombre)
                VALUES (
                    '$role'
				)"; 

			$res_empleados = mysqli_query($this->con, $sql_empleados);
            $res_empleado_rol = mysqli_query($this->con, $sql_empleado_rol); 
            
            /* Buscar y añadir en empleado_rol */
			if($res_empleados){
				 return true; 
			}else{
				return false;
			}

                 if($res_empleado_rol){
                    return true;
                }else{
                    return false;
                } 
		}

}

?>