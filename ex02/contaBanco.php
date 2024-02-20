<?php
    
    class ContaBanco{
        //atributos
        public $numConta;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;
        //Metodos Especiais=============================
        public function __construct() {
             
            $this-> saldo = 0;
            $this-> status = false;

            echo "<p> Conta criada com Sucesso";
        }

        public function setNumConta($n){

            $this->numConta = $n;

        }

        public function getNumConta(){

            return $this->numConta;

        }

        public function setTipo($t){

            $this->tipo = $t;

        }

        public function getTipo(){

            return $this->tipo;

        }

        public function setDono($d){

            $this-> dono = $d;

        }

        public function getDono(){

            return $this -> dono;

        }

        public function setSaldo($s){

            $this->saldo = $s;

        }

        public function getSaldo(){

            return $this -> saldo;

        }

        public function setStatus($sta){

            $this-> status = $sta;

        }

        public function getStatus(){

            return $this -> status;

        }


        // Métodos ====================================

        public function abrirConta($t){

            $this -> setTipo($t);
            $this-> setStatus(true);

            if($t == "CC"){

                $this-> setSaldo(50);
            }elseif($t == "CP"){
                $this-> saldo = 150;
            }

        }
        public function fecharConta(){

            if($this->getSaldo() > 0){

                echo "<p>ERRO: impossivel fechar a conta pois ainda exite valores nela";
            }
            elseif($this->getSaldo() <0){
                echo "<p>Impossivel fechar a conta pois existem débitos pendentes nela";
            }else{
                echo "<p>A Conta de ". $this->getDono()." Foi Fechada com Sucesso</p>";
                $this->setStatus(false);
            }

        }

        public function depositar($v){

            if($this->getStatus()){

                $this->setSaldo($this->getSaldo() + $v);
                echo"<p>Deposito de $v feito na conta do(a) ". $this->getDono(). " Com Sucesso</p>";
            }
            else{
                echo "<p>Conta Fechada não é possivel fazer o Deposito";
            }

        }

        public function sacar($v){

            if($this->getStatus()){

                if($this->getSaldo() >= $v){

                    $this->setSaldo($this->getSaldo()-$v);

                    echo"<p>Saque de $v autorizado na conta do(a) ".$this->getDono()."</p>";
    
                }else{
    
                    echo "Saldo Insuficiente para Saque";
    
                }

            }else{
                echo "<p>Não posso Sacar em uma conta fechada";
            }



        }

        public function pagarMensal(){

            if($this->getTipo() == "CC"){

                $v = 12;

            }
            elseif($this->getTipo() == "CP"){

                $v=20;

            }

            if($this->getStatus()){

                $this->setSaldo($this->getSaldo() - $v);
                echo"<p>Mensalidade de R$ $v debitada da conta de ". $this->getDono()."</p>";

            }else{
                echo "Problemas com a Conta, impossivel descontar";
            }

        }
        

    }
    
?>
