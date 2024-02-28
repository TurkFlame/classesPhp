<?php
// 01)------------------------------------------------------------------------------------------
// Crie uma classe chamada 'Livro' com propriedades privadas 'title' e 'writer'.
// Implemente um método construtor para inicializar essas propriedades.
// Em seguida, crie um objeto da classe 'Livro' e exiba suas propriedades.

namespace Atividade1 {
    class Livro
    {
        private $title;
        private $writer;

        public function __construct($title, $writer)
        {
            $this->title = $title;
            $this->writer = $writer;
        }

        public function getTitulo()
        {
            echo $this->title . "<br>";
        }
        public function getAutor()
        {
            echo $this->writer . "<br>";
        }
        public function setNewTitulo($newTitulo)
        {
            $this->title = $newTitulo;
        }
        public function setNewAutor($newAutor)
        {
            $this->writer = $newAutor;
        }
    }

    $livro = new Livro("Esqueceram de mim", "Riquinho");
    $livro->getTitulo();
    $livro->getAutor();
}

// 02)------------------------------------------------------------------------------------------------------------------------------------------------------
// Modifique a classe 'Livro' do exercício anterior.
// Adicione métodos públicos 'setTitulo($novoTitulo)' e 'setAutor($novoAutor)' que permitem modificar as propriedades.
// Use esses métodos para alterar o título e o writer do objeto criado.

namespace Atividade2 {
    $livro->setNewTitulo("A volta dos que não foram");
    $livro->setNewAutor("Benjamin Franklin");
    $livro->getTitulo();
    $livro->getAutor();
}

// 03------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe base chamada 'Animal' com propriedades privadas 'nome' e 'idade'.
// Implemente um método construtor e métodos públicos para acessar e modificar essas propriedades.
// Crie uma classe derivada chamada 'Cachorro' que herda de 'Animal' e sobrescreva o método de acesso à propriedade 'idade'.
// Crie um objeto da classe 'Cachorro' e exiba suas propriedades.

namespace Atividade3 {
    class Animal
    {
        public $nome;
        public $idade;
        public function __construct($nome, $idade){
            $this->nome = $nome;
            $this->idade = $idade;
        }
        public function getName(){
            echo "{$this->nome} <br>";
        }
        public function getIdade(){
            echo "{$this->idade} <br>";
        }
        public function setIdade($idade){
            $this->idade = $idade;
        }
    }


    $cachorro = new Cachorro1("Elton Jhones", 5);
    $cachorro->getName();
    $cachorro->getIdade();

}

// 04)---------------------------------------------------------------------------------------------------------------------------------------
// Modifique a classe 'Cachorro' do exercício anterior.
// Torne as propriedades 'nome' e 'idade' protegidas e utilize métodos getters e setters para acessá-las e modificá-las.

namespace Atividade4 {
    class Cachorro extends Atividade3\Animal
    {
        public function getName(){
            echo "Nome do cachorro: {$this->nome} <br>";
        }

        public function getIdade()
        {
            echo "Idade do cachorrro: {$this->idade} <br>";
        }

        public function setNome($nome)
        {
            echo "Nome do cachorro: {$this->nome} <br>";
        }
    }

    $cachorro1 = new Cachorro("Marley", 7);
    $cachorro1->getName();
    $cachorro1->getIdade();
}

// 05)---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe chamada 'Calculadora' com um método estático chamado 'soma' que recebe dois números e retorna a soma.
// Não é necessário instanciar a classe para utilizar o método 'soma'.
// Demonstre a utilização deste método.

namespace Atividade5 {
    class Calculadora
    {
        public static function soma($num1, $num2){
            echo "A soma de $num1 e $num2 é: $num1 + $num2 <br>";
        }
    }
    Calculadora::soma(5, 3);
}

//Aula 03
// 01)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Defina uma classe base 'Veiculo' com propriedades como 'marca' e 'modelo'.
// Crie duas classes derivadas, 'Carro' e 'Moto', que herdam de 'Veiculo'.
// Implemente métodos específicos para cada classe e um método comum para exibir informações gerais.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.

namespace Atividade1Aula3 {
    class Veiculo{
        protected $marca;
        protected $modelo;

        public function __construct($marca, $modelo){
            $this->marca = $marca;
            $this->modelo = $modelo;
        }

        public function getInfo(){
            echo "Marca: {$this->marca}, Modelo: {$this->modelo} <br>";
        }
    }

    class Carro extends Veiculo{
        private $numeroPortas;

        public function __construct($marca, $modelo, $numeroPortas){
            parent::__construct($marca, $modelo);
            $this->numeroPortas = $numeroPortas;
        }

        public function getInfo(){
            parent::getInfo();
            echo "Portas: {$this->numeroPortas} <br>";
        }
    }

    class Moto extends Veiculo{
        private $cilindradas;

        public function __construct($marca, $modelo, $cilindradas){
            parent::__construct($marca, $modelo);
            $this->cilindradas = $cilindradas;
        }

        public function getInfo(){
            parent::getInfo();
            echo "Cilindradas: {$this->cilindradas} <br>";
        }
    }

    $carro = new Carro("Toyota", "Corolla", 4);
    $moto = new Moto("Honda", "CBR600RR", 600);

    $carro->getInfo();
    $moto->getInfo();
}

// 02)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma trait chamada 'Mensagens' que define um método 'enviarMensagem'.
// Crie duas classes, 'EmailSender' e 'SMSSender', que utilizam a trait 'Mensagens'.
// Demonstre a utilização da trait em ambas as classes.

namespace Atividade2Aula3 {
    trait Mensagens{
        public function sendMessage($mensagem){
            echo "Enviando mensagem: {$mensagem}<br>";
        }
    }

    class EmailSender{
        use Mensagens;
        public function senEmail($destinatario, $assunto, $corpo){
            $mensagem = "Para: {$destinatario}, Assunto: {$assunto}, Corpo: {$corpo}";
            $this->sendMessage($mensagem);
        }
    }

    class SMSSender{
        use Mensagens;
        public function sendSMS($numero, $texto){
            $mensagem = "Para: {$numero}, Texto: {$texto}";
            $this->sendMessage($mensagem);
        }
    }

    $emailSender = new EmailSender();
    $emailSender->senEmail("luizfelipemarcondesdelima@gmail.com", "Teste", "Este é outro email");
    $smsSender = new SMSSender();
    $smsSender->sendSMS("42998546545", "Enviando novo sms");
}

// 03)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie duas classes, 'customer' e 'Pedido', no namespace 'Loja'.
// Em seguida, crie uma classe 'Pagamento' em um namespace diferente, por exemplo, 'Financeiro'.
// Demonstre a utilização das classes em seus respectivos namespaces.

namespace Atividade3Aula3 {
    namespace Loja {
        class customer{
            private $nome;

            public function __construct($nome){
                $this->nome = $nome;
            }
            public function getName(){
                echo "customer: " . $this->nome;
            }
        }

        class Pedido{
            private $numero;

            public function __construct($numero){
                $this->numero = $numero;
            }
            public function getNumber(){
                echo "Pedido: {$this->numero} <br>";
            }
        }
    }

    namespace Financeiro {
        class Pagamento{
            private $valor;
            public function __construct($valor){
                $this->valor = $valor;
            }

            public function getValue(){
                echo "Valor do Pagamento: {$this->valor} <br>";
            }
        }
    }

    use Loja\customer;
    use Loja\Pedido;
    use Financeiro\Pagamento;

    $cliente = new customer("João");
    $pedido = new Pedido("123456");

    $cliente->getName();
    $pedido->getNumber();
    $pagamento = new Pagamento(100.50);
    $pagamento->getValue();
}

// 04)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie uma classe base 'Animal' com um método 'emitirSom'.
// Crie duas classes derivadas, 'Cachorro' e 'Gato', que herdam de 'Animal'.
// Sobrescreva o método 'emitirSom' em ambas as classes derivadas para representar o som característico.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.

namespace Atividade4Aula3 {
    class Animal{
        public function emitirSom(){
            echo "Som animalesco <br>";
        }
    }

    class Cachorro extends Animal{
        public function emitirSom(){
            echo "Au au! <br>";
        }
    }

    class Gato extends Animal{
        public function emitirSom(){
            echo "Miau! <br>";
        }
    }

    $cachorro = new Cachorro();
    $gato = new Gato();

    $cachorro->emitirSom();
    $gato->emitirSom();
}

// 05)--------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Crie duas traits, 'LogErro' e 'LogInfo', ambas com um método 'registrarLog'.
// Em seguida, crie uma classe 'Registro' que utiliza ambas as traits.
// Demonstre o uso da classe e resolva possíveis conflitos de métodos.

namespace Atividade5Aula3 {
    trait LogErro{
        public function registrarLog($mensagem){
            echo "Erro: $mensagem<br>";
        }
    }

    trait LogInfo{
        public function registrarLog($mensagem){
            echo "Info: $mensagem<br>";
        }
    }

    class Registro{
        use LogErro, LogInfo {
            LogErro::registrarLog insteadof LogInfo; // Resolve conflito usando o método da trait LogErro
            LogInfo::registrarLog as registrarLogInfo; // Renomeia o método da trait LogInfo
        }
    }

    $registro = new Registro();
    $registro->registrarLog("Erro de exemplo");
    $registro->registrarLogInfo("Registro de informação de exemplo");
}
?>