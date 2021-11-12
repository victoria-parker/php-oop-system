<?php
class Destino{
    private $destId;
    private $destNombre;
    private $regId;
    protected $regNombre;
    private $destPrecio;
    private $destAsientos;
    private $destDisponibles;
    private $destActivo;

    public function listarDestinos(){
        $link=Conexion::conectar();

        $sql="SELECT destId,destNombre,
                     d.regId, r.regNombre,
                     destPrecio,destAsientos, 
                     destDisponibles,destActivo 
                     FROM destinos d, regiones r
                     WHERE d.regId=r.regId";

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
                     d.regId, r.regNombre,
                     destPrecio,destAsientos, 
                     destDisponibles,destActivo 
                     FROM destinos d, regiones r
                     WHERE d.regId=r.regId AND destId= :destId";

        $stmt=$link->prepare($sql);

        $stmt->bindParam(":destId",$destId,PDO::PARAM_INT);

        if($stmt->execute()){
            $destino=$stmt->fetch();//me devuelve un array asociativo
            $this->setDestId($destId);
            $this->setDestNombre($destino['destNombre']);
            $this->setRegId($destino['regId']);
            $this->setRegNombre($destino['regNombre']);
            $this->setDestPrecio($destino['destPrecio']);
            $this->setDestAsientos($destino['destAsientos']);
            $this->setDestDisponibles($destino['destDisponibles']);
            $this->setDestActivo(1);
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
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * @param mixed $regId
     */
    public function setRegId($regId): void
    {
        $this->regId = $regId;
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
