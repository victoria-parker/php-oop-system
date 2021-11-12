<?php

class Region{
    private $regId;
    private $regNombre;

    public function listarRegiones(){

        $link=Conexion::conectar();

        $sql="SELECT regId,regNombre FROM regiones";

        $stmt=$link->prepare($sql);
        $stmt->execute();

        $regiones=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $regiones;
    }

    public function verRegionPorId(){
        $link=Conexion::conectar();
        $regId=$_GET['regId'];

        $sql="SELECT regId,regNombre FROM regiones WHERE regId=".$regId;

        $stmt=$link->prepare($sql);

        $stmt->execute();
        $datosRegion=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->setRegId($datosRegion['regId']);
        $this->setRegNombre($datosRegion['regNombre']);
        return $stmt;
    }

    public function modificarRegion()
    {
        $link=Conexion::conectar();
        $regId=$_POST['regId'];
        $regNombre=$_POST['regNombre'];

        $sql="UPDATE regiones SET regNombre= :regNombre WHERE regId= :regId ";

        $stmt=$link->prepare($sql);

        //Data binding
        $stmt->bindParam(":regNombre",$regNombre,PDO::PARAM_STR);
        $stmt->bindParam(":regId",$regId,PDO::PARAM_INT);

        if($stmt->execute()){
            $this->setRegId($regId);
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
            $this->setRegId($link->lastInsertId());
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * @param mixed $regId
     */
    public function setRegId($regId): void //void es que no retorna nada
    {
        $this->regId = $regId;
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
