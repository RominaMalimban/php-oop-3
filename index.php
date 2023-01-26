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

// class Persona
class Persona
{
    private $nome;
    private $cognome;
    private $dataNascita;
    private $luogoNascita;
    private $cf;

    public function __construct($nome, $cognome, $dataNascita, $luogoNascita, $cf)
    {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setDataNascita($dataNascita);
        $this->setLuogoNascita($luogoNascita);
        $this->setCf($cf);
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }
    public function getCognome()
    {
        return $this->cognome;
    }
    public function setDataNascita($dataNascita)
    {
        $this->dataNascita = $dataNascita;
    }
    public function getDataNascita()
    {
        return $this->dataNascita;
    }
    public function setLuogoNascita($luogoNascita)
    {
        $this->luogoNascita = $luogoNascita;
    }
    public function getLuogoNascita()
    {
        return $this->luogoNascita;
    }
    public function setCf($cf)
    {
        $this->cf = $cf;
    }
    public function getCf()
    {
        return $this->cf;
    }

    public function getHtmlPersona()
    {
        return
            "<ul>
            <li>Nome: " . $this->getNome() . "</li>" .
            "<li> Cognome: " . $this->getCognome() . "</li>" .
            "<li>Data di Nascita: " . $this->getDataNascita() . "</li>" .
            "<li>Luogo di Nascita: " . $this->getLuogoNascita() . "</li>" .
            "<li>Codice Fiscale: " . $this->getCf() . "</li>" .
            "</ul>";
    }
}

echo "STIPENDIO:";
$stipendio1 = new Stipendio("1500", "si", "si");
echo $stipendio1->getHtmlStipendio();

echo "----------------------------------------------------------<br><br>";

echo "PERSONA:";
$persona = new Persona("Pinco", "Pallo", "1978-12-10", "Roma", "JDIOWE390E23732");
echo $persona->getHtmlPersona();