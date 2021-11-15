<?php
class Destino{
    private $destId;
    private $destNombre;
    private $regID;
    protected $regNombre;
    private $destPrecio;
    private $destAsientos;
    private $destDisponibles;
    private $destActivo;

    public function listarDestinos(){
        $link=Conexion::conectar();

        $sql="SELECT destId,destNombre,
                     d.regID, r.regNombre,
                     destPrecio,destAsientos, 
                     destDisponibles,destActivo 
                     FROM destinos d, regiones r
                     WHERE d.regID=r.regID";

        $stmt=$link->prepare($sql);
        $stmt->execute();

        $destinos=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $destinos;
    }

    public function verDestinoPorId()
    {
        $destId=$_GET['destId'];
        $link=Conexion::conectar();

        $sql="SELECT destId,destNombre,
                     d.regID, r.regNombre,
                     destPrecio,destAsientos, 
                     destDisponibles,destActivo 
                     FROM destinos d, regiones r
                     WHERE d.regID=r.regID AND destId= :destId";

        $stmt=$link->prepare($sql);

        $stmt->bindParam(":destId",$destId,PDO::PARAM_INT);

        if($stmt->execute()){
            $destino=$stmt->fetch();//me devuelve un array asociativo
            $this->setDestId($destId);
            $this->setDestNombre($destino['destNombre']);
            $this->setRegID($destino['regID']);
            $this->setRegNombre($destino['regNombre']);
            $this->setDestPrecio($destino['destPrecio']);
            $this->setDestAsientos($destino['destAsientos']);
            $this->setDestDisponibles($destino['destDisponibles']);
            $this->setDestActivo(1);
            return true;
        }
        return false;
    }

    public function agregarDestino()
    {
        $destNombre=$_POST['destNombre'];
        $regID=$_POST['regID'];
        $destPrecio=$_POST['destPrecio'];
        $destAsientos=$_POST['destAsientos'];
        $destDisponibles=$_POST['destDisponibles'];

        $link=Conexion::conectar();

        $sql="INSERT INTO destinos SET
              destNombre= :destNombre,
              regID= :regID,
              destPrecio= :destPrecio,
              destAsientos= :destAsientos,
              destDisponibles= :destDisponibles;";

        $stmt=$link->prepare($sql);

        $stmt->bindParam(':destNombre', $destNombre,PDO::PARAM_STR);
        $stmt->bindParam(':regID',$regID,PDO::PARAM_INT);
        $stmt->bindParam(':destPrecio',$destPrecio,PDO::PARAM_INT);
        $stmt->bindParam(':destAsientos',$destAsientos,PDO::PARAM_INT);
        $stmt->bindParam(':destDisponibles',$destDisponibles,PDO::PARAM_INT);

        if($stmt->execute()){
            $this->setDestNombre($destNombre);
            $this->setDestId($link->lastInsertId());
            $this->setRegID($regID);
            $this->setDestPrecio($destPrecio);
            $this->setDestAsientos($destAsientos);
            $this->setDestDisponibles($destDisponibles);
            $this->setDestActivo(1);//default
            return true;
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getDestId()
    {
        return $this->destId;
    }

    /**
     * @param mixed $destId
     */
    public function setDestId($destId): void
    {
        $this->destId = $destId;
    }

    /**
     * @return mixed
     */
    public function getDestNombre()
    {
        return $this->destNombre;
    }

    /**
     * @param mixed $destNombre
     */
    public function setDestNombre($destNombre): void
    {
        $this->destNombre = $destNombre;
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
    public function setRegID($regID): void
    {
        $this->regID = $regID;
    }

    /**
     * @return mixed
     */
    public function getDestPrecio()
    {
        return $this->destPrecio;
    }

    /**
     * @param mixed $destPrecio
     */
    public function setDestPrecio($destPrecio): void
    {
        $this->destPrecio = $destPrecio;
    }

    /**
     * @return mixed
     */
    public function getDestAsientos()
    {
        return $this->destAsientos;
    }

    /**
     * @param mixed $destAsientos
     */
    public function setDestAsientos($destAsientos): void
    {
        $this->destAsientos = $destAsientos;
    }

    /**
     * @return mixed
     */
    public function getDestDisponibles()
    {
        return $this->destDisponibles;
    }

    /**
     * @param mixed $destDisponobles
     */
    public function setDestDisponibles($destDisponibles): void
    {
        $this->destDisponibles = $destDisponibles;
    }

    /**
     * @return mixed
     */
    public function getDestActivo()
    {
        return $this->destActivo;
    }

    /**
     * @param mixed $destActivo
     */
    public function setDestActivo($destActivo): void
    {
        $this->destActivo = $destActivo;
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
