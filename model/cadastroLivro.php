<?php
require_once("banco.php");

class Cadastro extends Banco
{

    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $flag;
    private $data;
    private $imagem;

    //Metodos Set
    public function setNome($string)
    {
        $this->nome = $string;
    }
    public function setAutor($string)
    {
        $this->autor = $string;
    }
    public function setQuantidade($string)
    {
        $this->quantidade = $string;
    }
    public function setPreco($string)
    {
        $this->preco = $string;
    }
    public function setFlag($string)
    {
        $this->flag = $string;
    }
    public function setData($string)
    {
        $this->data = $string;
    }
    public function setImagem($string)
    {
        $this->imagem = $string;
    }
    //Metodos Get
    public function getNome()
    {
        return $this->nome;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getFlag()
    {
        return $this->flag;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getImagem()
    {
        return $this->imagem;
    }


    public function incluir()
    {
        return $this->setLivro($this->getNome(), $this->getAutor(), $this->getQuantidade(), $this->getPreco(), $this->getData(), $this->getImagem());
    }
}
