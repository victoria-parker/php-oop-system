<?php

class Region{
    private $regID;
    private $regNombre;

    public function listarRegiones(){

        $link=Conexion::conectar();

        $sql="SELECT regID,regNombre FROM regiones";

        $stmt=$link->prepare($sql);
        $stmt->execute();

        $regiones=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $regiones;
    }

    public function verRegionPorId(){
        $link=Conexion::conectar();
        $regID=$_GET['regID'];

        $sql="SELECT regID,regNombre FROM regiones WHERE regID=".$regID;

        $stmt=$link->prepare($sql);

        $stmt->execute();
        $datosRegion=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->setRegID($datosRegion['regID']);
        $this->setRegNombre($datosRegion['regNombre']);
        return $stmt;
    }

    public function modificarRegion()
    {
        $link=Conexion::conectar();
        $regID=$_POST['regID'];
        $regNombre=$_POST['regNombre'];

        $sql="UPDATE regiones SET regNombre= :regNombre WHERE regID= :regID ";

        $stmt=$link->prepare($sql);

        //Data binding
        $stmt->bindParam(":regNombre",$regNombre,PDO::PARAM_STR);
        $stmt->bindParam(":regID",$regID,PDO::PARAM_INT);

        if($stmt->execute()){
            $this->setRegID($regID);
            $this->setRegNombre($regNombre);
            return true;
        }
        return false;

    }

    public function agregarRegion(){
        $link=Conexion::conectar();
        $regNombre=$_POST['regNombre'];

        $sql="INSERT INTO regiones SET regNombre= :regNombre";

        $stmt=$link->prepare($sql);

        $stmt->bindParam(":regNombre",$regNombre,PDO::PARAM_STR);

        if($stmt->execute()){
            $this->setRegNombre($regNombre);
            $this->setRegID($link->lastInsertId());
            return true;
        }
        return false;
    }

    public function verificarRegion()
    {
        $regID=$_GET['regID'];
        $this->verRegionPorId();
        $link=Conexion::conectar();

        $sql="SELECT 1 FROM destinos WHERE regID = :regID";

        $stmt=$link->prepare($sql);
        $stmt->bindParam(':regID',$regID,PDO::PARAM_INT);
        $stmt->execute();

        $cantidad=$stmt->rowCount();
        return $cantidad;
    }
    public function eliminarRegion()
    {
        $regID=$_POST['regID'];
        $regNombre=$_POST['regNombre'];
        $link=Conexion::conectar();

        $sql="DELETE FROM regiones WHERE regID= :regID";

        $stmt=$link->prepare($sql);
        $stmt->bindParam(':regID',$regID,PDO::PARAM_INT);

        if($stmt->execute()){
            $this->setRegID($regID);
            $this->setRegNombre($regNombre);
            return $this;
        }
        return false;

    }
    /**
     * @return mixed
     */
    public function getRegID()
    {
        return $this->regID;
    }

    /**
     * @param mixed $regID
     */
    public function setRegID($regID): void //void es que no retorna nada
    {
        $this->regID = $regID;
    }

    /**
     * @return mixed
     */
    public function getRegNombre()
    {
        return $this->regNombre;
    }

    /**
     * @param mixed $regNombre
     */
    public function setRegNombre($regNombre): void
    {
        $this->regNombre = $regNombre;
    }



}
