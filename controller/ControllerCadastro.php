<?php
require_once("../model/cadastroLivro.php");
class cadastroController
{

    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir()
    { // imagem
        $error = array();
        // Verifica se o arquivo é uma imagem
        $imagem = $_FILES["imagem"];
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])) {
            $error[1] = "Isso não é uma imagem.";
        }

        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        // Gera um nome único para a imagem
        $nome_imagem = $imagem["name"];
        // $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        // Caminho de onde ficará a imagem
        $caminho_imagem = "img/" . $nome_imagem;
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setAutor($_POST['autor']);
        $this->cadastro->setQuantidade($_POST['quantidade']);
        $this->cadastro->setPreco($_POST['preco']);
        $this->cadastro->setData(date('Y-m-d', strtotime($_POST['data'])));
        $this->cadastro->setImagem($caminho_imagem);

        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }
}
new cadastroController();
