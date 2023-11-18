<?php

namespace App\Application\Repository;

use App\Domain\Book;

interface BookRepository {
    public function list(string $titulo, string $titulo_do_indice);
    public function listAll();
    public function add(Book $book) : Book;
}
