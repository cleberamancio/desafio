<?php

namespace App\Domain;

class SubIndex{
    private int $id = 0;
    private string $titulo; 
    private int $pagina; 
    private $subindices = array(); 

    public function __construct(){

    }

    public function setSubIndex(SubIndex $subIndex): void{
        $this->subindices[] = $subIndex;
    }

    public function getSubIndex(): void{
        $this->subindices;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getPagina(){
        return $this->pagina;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }

    public function setPagina(int $pagina): void{
        $this->pagina = $pagina;
    }

    
}