<?php
require_once("../init.php");

class Json
{

    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function getJson()
    {
        $result = $this->mysqli->query("SELECT * FROM livros");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        // Criando um json
        // echo '{"livros":' . json_encode($array, JSON_UNESCAPED_UNICODE) . '}';
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        // return $array;
    }
}
$result = new Json();
$result->getJson();
