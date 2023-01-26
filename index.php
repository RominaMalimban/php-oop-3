<?php

// classe Stipendio:

class Stipendio
{
    private $mensile;
    private $tredicesima;
    private $quattordicesima;

    public function __construct($mensile, $tredicesima, $quattordicesima)
    {
        $this->setMensile($mensile);
        $this->setTredicesima($tredicesima);
        $this->setQuattordicesima($quattordicesima);
    }

    public function setMensile($mensile)
    {
        $this->mensile = $mensile;
    }
    public function getMensile()
    {
        return $this->mensile;
    }
    public function setTredicesima($tredicesima)
    {
        $this->tredicesima = $tredicesima;
    }
    public function getTredicesima()
    {
        return $this->tredicesima;
    }
    public function setQuattordicesima($quattordicesima)
    {
        $this->quattordicesima = $quattordicesima;
    }
    public function getQuattordicesima()
    {
        return $this->quattordicesima;
    }

    // metodo che restituisce lo stipendio annuale:
    public function getStipendioAnnuo()
    {
        return ($this->getMensile() * 12) + $this->getTredicesima() + $this->getQuattordicesima();
    }
    public function getHtmlStipendio()
    {
        return
            "<ul>
                <li>Mensile: " . $this->getMensile() . "</li>" .
            "<li> Tredicesima: " . $this->getTredicesima() . "</li>" .
            "<li>Quattordicesima: " . $this->getQuattordicesima() . "</li>" .
            "</ul>";
    }
}

$stipendio1 = new Stipendio("1500", "si", "si");

echo $stipendio1->getHtmlStipendio();