<?php 
/* class Caneta{

   public $modelo;
   public $cor;
   private $ponta;
   protected $carga;
   protected $tampada;

    function rabiscar(){
        if($this-> tampada == true){

            echo"<p>ERRO: impossivel rabiscar<br>";

        }else{

            echo" <p>Estou rabiscando..<br>";

        }
    }

    function tampar(){

        $this->tampada = true;

    }

    function destampar(){

        $this->tampada = false;

    }

} */

/* class Caneta{

    public $modelo;
    private $ponta;
    private $cor;
    private $tampada;

    public function __construct($m,$c,$p)
    {
        $this -> modelo = $m;
        $this->cor = $c;
        $this-> ponta =$p;
    }

    public function tampar(){

        $this -> tampada = true;

    }

    public function getModelo(){

        return $this -> modelo;

    }
    public function setModelo($m){

        $this -> modelo = $m;

    }
    public function getPonta(){

        return $this -> ponta;

    }

    public function setPonta($p){
        $this -> ponta = $p;
    }

} */

class Caneta{

    public $modelo;
    private $ponta;
    private $cor;
    private $tampada;

    

}

?>