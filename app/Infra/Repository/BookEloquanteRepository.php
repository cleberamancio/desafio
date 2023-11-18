<?php

namespace App\Infra\Repository;

use App\Domain\Book;
use App\Application\Repository\BookRepository;
use App\Models\Book as ModelsBook;
use Illuminate\Database\Eloquent\Model;

class BookEloquanteRepository extends Model implements BookRepository
{
    public function list(string $titulo, string $titulo_do_indice){
        $book = new Book();
        $book->setTitulo("O gato de botas");
        return $book;
    }

    public function listAll(){

        return array();
    }

    public function add(Book $book) : Book{

        ModelsBook::create([
            'titulo' => $book->getTitulo(),
            'usuario_publicador' => $book->getUsuarioPublicador()
        ]);

        $obj = new ModelsBook;
        $obj->title = $book->getTitulo();
        $obj->usuario_publicador = $book->getUsuarioPublicador();
        
        $result = $obj->save();
        
        return $book;
    }
}
