<?php

use DateTime;

/**
 * Class Divida.
 *
 * @author  Diogo Freire
 */
class Divida
{
  
    protected $id;
    protected $tipoDivida;
    protected $valorOriginario;
    protected $dataVencimento;
    protected $multa;

    /**
     * Divida constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        
    }
    
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int|null $id
     *
     * @return Pessoa
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipoDivida()
    {
        return $this->tipoDivida;
    }
    
    /**
     * @param string|null $tipoDivida
     *
     * @return Divida
     */
    public function setTipoDivida($tipoDivida): self
    {
        $this->tipoDivida = $tipoDivida;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValorOriginario()
    {
        return $this->valorOriginario;
    }

    /**
     * @param float|null $valorOriginario
     *
     * @return Pessoa
     */
    public function setValorOriginario($valorOriginario): self
    {
        $this->valorOriginario = $valorOriginario;

        return $this;
    }

    /**
     * @return Date|null
     */
    public function getDtVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param Date|null $dataVencimento
     *
     * @return Pessoa
     */
    public function setDtVencimento($dataVencimento): self
    {
        $this->dataVencimento = $dataVencimento;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMulta()
    {
        return $this->multa;
    }

    /**
     * @param float|null $multa
     *
     * @return Divida
     */
    public function setMulta($multa): self
    {
        $this->multa = $multa;

        return $this;
    }
    
    
}
?>