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

  public function exec($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    $consulta-> execute($bind);
    //print_r($consulta->errorInfo());
  }

  public function select($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    $consulta-> execute($bind);
    //print_r($consulta->errorInfo());
    return $consulta;
  }

  public function selectWhere($sql,$where,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare("$sql where $where");
    $consulta-> execute($bind);
    //print_r($consulta->errorInfo());
    return $consulta;
  }
  
  public function selectCount($tabla,$id) {
    $cnn = DB::conexion();
    $sql = "select count($id) as cantidad from $tabla";
    $consulta = $cnn->prepare($sql);
    $consulta-> execute();
    return $consulta;
  }

  public function selectSum($tabla,$campo) {
    $cnn = DB::conexion();
    $sql = "select sum($campo) as cantidad from $tabla";
    $consulta = $cnn->prepare($sql);
    $consulta-> execute();
    return $consulta;
  }

  public function selectSumWhere($tabla,$campo,$where) {
    $cnn = DB::conexion();
    $sql = "select sum($campo) as cantidad from $tabla where $where";
    $consulta = $cnn->prepare($sql);
    $consulta-> execute();
    return $consulta;
  }

  public function insert($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    if ($consulta-> execute($bind))
      return $cnn->lastInsertId();
    else {
      print_r($consulta->errorInfo());
      return 0;
    }
  }

  public function delete($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    if ($consulta-> execute($bind))
      return 1;
    else {
      print_r($consulta->errorInfo());
      return 0;
    }
  }

  public function update($sql,$bind) {
    $cnn = DB::conexion();
    $consulta = $cnn->prepare($sql);
    if ($consulta-> execute($bind))
      return $consulta->rowCount();
    else {
      print_r($consulta->errorInfo());
      return 0;
    }
  }
}
?>
