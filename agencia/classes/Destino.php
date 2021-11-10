<?php
class Destino{
    private $destId;
    private $destNombre;
    private $regId;
    private $destPrecio;
    private $destAsientos;
    private $destDisponible;
    private $destActivo;

    public function listarDestinos(){
        $link=Conexion::conectar();

        $sql="SELECT destId,destNombre,regId,destPrecio,destAsientos, destDisponibles,destActivo FROM destinos";

        $stmt=$link->prepare($sql);
        $stmt->execute();

        $destinos=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $destinos;
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
    public function getDestDisponible()
    {
        return $this->destDisponible;
    }

    /**
     * @param mixed $destDisponoble
     */
    public function setDestDisponible($destDisponible): void
    {
        $this->destDisponible = $destDisponible;
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

}
