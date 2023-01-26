<?php

// classe Stipendio:

class Stipendio{
    public $mensile;
    public $tredicesima;
    public $quattordicesima;

    public function __construct($mensile, $tredicesima, $quattordicesima){
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
        $mesi = 12;
        if ($this->tredicesima) {
            $mesi += 1;

            if ($this->quattordicesima) {
                $mesi += 1;
            }
        }
        return $mesi * $this->mensile;
    }
    public function getHtmlStipendio()
    {
        return
            "<ul>
                <li>Mensile: " . $this->getMensile() . "</li>" .
            "<li> Tredicesima: " . $this->getTredicesima() . "</li>" .
            "<li>Quattordicesima: " . $this->getQuattordicesima() . "</li>" .
            "<li>Stipendio Annuo: " . $this->getStipendioAnnuo() . "</li>" .
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

// classe impiegato:
class Impiegato extends Persona
{
    private Stipendio $stipendio;
    private $dataAssunzione;

    public function __construct($nome, $cognome, $dataNascita, $luogoNascita, $cf, Stipendio $stipendio, $dataAssunzione)
    {
        parent::__construct($nome, $cognome, $dataNascita, $luogoNascita, $cf);
        $this->setStipendio($stipendio);
        $this->setDataAssunzione($dataAssunzione);
    }
    public function setStipendio(Stipendio $stipendio)
    {
        $this->stipendio = $stipendio;
    }
    public function getStipendio()
    {
        return $this->stipendio;
    }
    public function setDataAssunzione($dataAssunzione)
    {
        $this->dataAssunzione = $dataAssunzione;
    }
    public function getDataAssunzione()
    {
        return $this->dataAssunzione;
    }

    public function getHtmlImpiegato(){
        return parent::getHtmlPersona() .
            "<ul>
                <li>Stipendio Annuale: " . $this->getStipendio()->getStipendioAnnuo() . " &euro;</li>" .
                "<li>Data di assunzione: " . $this->getDataAssunzione() . "</li>" .
            "</ul>";
    }
}

// classe capo:
class Capo extends Persona
{
    private $dividendo;
    private $bonus;

    public function __construct($nome, $cognome, $dataNascita, $luogoNascita, $cf, $dividendo, $bonus)
    {
        parent::__construct($nome, $cognome, $dataNascita, $luogoNascita, $cf);
        $this->setDividendo($dividendo);
        $this->setBonus($bonus);
    }

    public function setDividendo($dividendo)
    {
        $this->dividendo = $dividendo;
    }
    public function getDividendo()
    {
        return $this->dividendo;
    }
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;
    }
    public function getBonus()
    {
        return $this->bonus;
    }

    // metodo che restituisce il reddito annuale:
    public function getRedditoAnnuo(){
        return $this->dividendo * 12 + $this->bonus;
    }

    // metodo HTML:
    public function getHtmlCapo()
    {
        return parent::getHtmlPersona() .
            "<ul>
                <li>Dividendo: " . $this->getDividendo() . " &euro;</li>" .
                "<li>Bonus: " . $this->getBonus() . " &euro;</li>" .
                "<li>Reddito Annuo: " . $this->getRedditoAnnuo() . " &euro;</li>" .
            "</ul>";
    }
}

// echo "STIPENDIO:";
// $stipendio1 = new Stipendio("1500", true, true);
// echo $stipendio1->getHtmlStipendio();


echo "----------------------------------------------------------<br><br>";

echo "PERSONA:";
$persona = new Persona("Pinco", "Pallo", "1978-12-10", "Roma", "JDIOWE390E23732");
echo $persona->getHtmlPersona();

echo "----------------------------------------------------------<br><br>";

echo "IMPIEGATO:";
$impiegato = new Impiegato("Pinco", "Pallo", "1978-12-10", "Roma", "JDIOWE390E23732", new Stipendio("1300", true, true), "2023-03-01");
echo $impiegato->getHtmlImpiegato();

echo "----------------------------------------------------------<br><br>";

echo "CAPO:";
$capo1 = new Capo("Mario", "Rossi", "1978-12-10", "Roma", "JDIOWE390E23732", "2000", "6373");
echo $capo1->getHtmlCapo();