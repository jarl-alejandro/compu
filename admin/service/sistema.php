<?php
//Importo la conexion de mysql
include "../config/conexion_mysql.php";

$employeExist = $db->query("SELECT * FROM empleados");

if ($employeExist->rowCount() == 0) {
  $cedula = "0123456789";
  $nombre = "Admin";
  $email = "admin@admin.com";
  $cargo = "Administrador";
  $password = sha1("admin");
  $telefono = 1234567;
  $direccion = "CompuSoftNet Oficinas";

  $empleado = $db->prepare("INSERT INTO empleados (emp_ced, emp_nomb, emp_emai, emp_carg, emp_pass, emp_tele,
                            emp_dir) VALUES (?, ?, ?, ?, ?, ?, ?)");

  $empleado->bindParam(1, $cedula);
  $empleado->bindParam(2, $nombre);
  $empleado->bindParam(3, $email);
  $empleado->bindParam(4, $cargo);
  $empleado->bindParam(5, $password);
  $empleado->bindParam(6, $telefono);
  $empleado->bindParam(7, $direccion);

  $empleado->execute();
}
