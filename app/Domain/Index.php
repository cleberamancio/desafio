<?php

namespace App\Domain;

class Index{
    private int $id;
    private string $titulo; 
    private int $pagina; 
    private $subindices = array(); 

    public function getId(): int{
        return $this->id;
    }

    public function getSubIndex(): void{
        $this->subindices;
    }

    public function getIndicePaiId(){
        return $this->subindices;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getPagina(): int{
        return $this->pagina;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setSubIndex(SubIndex $subIndex): void{
        $this->subindices[] = $subIndex;
    }


    public function setTitulo(string $titulo): string{
        return $this->titulo = $titulo;
    }

    public function setPagina(string $pagina): string{
        return $this->pagina = $pagina;
    }
    
}