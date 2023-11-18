<?php

namespace App\Domain;

class Book{
    private int $id = 0;
    private $usuario_publicador = array();
    private string $titulo; 
    private $indices = array(); 

    public function __construct(){

    }

    public function getIndex(int $index){
        return $this->indices[$index];
    }

    public function setIndex(Index $indexParam): void{
        $this->indices[] = $indexParam;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getUsuarioPublicador() {
        return $this->usuario_publicador;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setUsuarioPublicador(int $id, string $name): void{
        $this->usuario_publicador = array("id" => $id, "nome"=> $name);
    }

    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }

}