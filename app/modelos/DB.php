<?php
class DB {
  private static $driver = "mysql";
  private static $host   = "localhost";
  private static $dbname = "control_consumo";
  private static $user   = "root";
  private static $pass   = "";
  
  public function conexion() {
    try 
      {
      $cnn = new PDO(DB::$driver.":host=".DB::$host.";dbname=".DB::$dbname, DB::$user, DB::$pass);
      return $cnn;
      }
    catch (PDOException $e) 
      {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }    
  }
  
  public function select($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    $consulta-> execute($bind);
    return $consulta;
  }

  public function insert($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    if ($consulta-> execute($bind))
      return $cnn->lastInsertId();
    else
      return 0;
  }
}
?>