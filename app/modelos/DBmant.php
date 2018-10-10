<?php
class DBmant {
  private static $driver = "mysql";
  private static $host   = "localhost";
  private static $dbname = "mantenimiento";
  private static $user   = "root";
  private static $pass   = "";
  
  public function conexion() {
    try 
      {
      $cnn = new PDO(DBmant::$driver.":host=".DBmant::$host.";dbname=".DBmant::$dbname, DBmant::$user, DBmant::$pass);
      return $cnn;
      }
    catch (PDOException $e) 
      {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }    
  }
  
  public function select($sql,$bind) {
    $cnn = DBmant::conexion();
    $consulta = $cnn->prepare($sql);
    $consulta-> execute($bind);
    return $consulta;
  }
}
?>