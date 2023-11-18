<?php

namespace Tests\Unit;

use App\Domain\Book;
use App\Domain\Index;
use App\Domain\SubIndex;
#use App\Infra\Repository\BookEloquanteRepository as RepositoryBookEloquanteRepository;
use App\Infra\Repository\BookEloquanteRepository;
use PHPUnit\Framework\TestCase;
use Mockery;
class BookTest extends TestCase
{

    public function test_if_book_was_created(): void
    {
        $bookReturn = new Book();
        $bookReturn->setId(1);
        $bookReturn->setUsuarioPublicador(1, "Bill");
        $bookReturn->setTitulo("Alice no país da maravilhas");

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('add')->andReturn($bookReturn);

        $book = new Book();
        $book->setUsuarioPublicador(1, "Bill");
        $book->setTitulo("Alice no país da maravilhas");
        $return = $repository->add($book);
        $this->assertEquals($return->getId(), 1);

        Mockery::close();
    }

    public function test_if_book_has_a_title_and_not_add(): void
    {
        $bookReturn = new Book();
        $bookReturn->setUsuarioPublicador(1, "Bill");

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('add')->andReturn($bookReturn);

        $book = new Book();
        $book->setUsuarioPublicador(1, "Bill");

        $return = $repository->add($book);

        $this->assertEquals($return->getId(), 0);
        Mockery::close();
    }


    public function test_if_book_has_a_getUsuarioPublicadorId_and_not_add(): void
    {
        $bookReturn = new Book();
        $bookReturn->setTitulo("Alice no país da maravilhas");

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('add')->andReturn($bookReturn);

        $book = new Book();
        $book->setTitulo("Alice no país da maravilhas");
        $return = $repository->add($book);
        $this->assertEquals($return->getId(), 0);
        Mockery::close();
    }


    public function test_if_a_index_has_been_added_in_book(): void
    {
        $bookReturn = new Book();
        $bookReturn->setId(1);
        $bookReturn->setUsuarioPublicador(1, "Bill");
        $bookReturn->setTitulo("Exemplo");

        $index = new Index();
        $index->setId(1);
        $index->setTitulo("Alfa");
        $index->setPagina(1);

        $subindice = new SubIndex();
        $subindice->setId(1);
        $subindice->setTitulo("Beta");
        $subindice->setPagina(1);

        $subindiceOfthis = new SubIndex();
        $subindiceOfthis->setId(1);
        $subindiceOfthis->setTitulo("Gama");
        $subindiceOfthis->setPagina(1);

        $subindice->setSubIndex($subindiceOfthis);

        $index->setSubIndex( $subindice );
        $bookReturn->setIndex($index);

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('add')->andReturn($bookReturn);

        $book = new Book();
        $book->setId(1);
        $book->setUsuarioPublicador(1, "Bill");
        $book->setTitulo("Exemplo");

        $index = new Index();
        $index->setId(1);
        $index->setTitulo("Alfa");
        $index->setPagina(1);

        $subindice = new SubIndex();
        $subindice->setId(1);
        $subindice->setTitulo("Beta");
        $subindice->setPagina(1);

        $subindiceOfthis = new SubIndex();
        $subindiceOfthis->setId(1);
        $subindiceOfthis->setTitulo("Gama");
        $subindiceOfthis->setPagina(1);

        $subindice->setSubIndex($subindiceOfthis);
        
        $index->setSubIndex( $subindice );
        $book->setIndex($index);

        $return = $repository->add($book);

        $this->assertNotNull($return->getIndex(0));

        Mockery::close();
    }
    
    public function test_if_a_book_not_has_a_index(): void
    {
        $bookReturn = new Book();
        $bookReturn->setId(1);
        $bookReturn->setUsuarioPublicador(1, "Bill");
        $bookReturn->setTitulo("Exemplo");

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('add')->andReturn($bookReturn);

        $book = new Book();
        $book->setId(1);
        $book->setUsuarioPublicador(1, "Bill");
        $book->setTitulo("Exemplo");

        $return = $repository->add($book);

        $this->assertNull($return->getIndex(0));

        Mockery::close();
    }


    public function test_if_list_books(): void
    {
        
        $bookReturn = new Book();
        $bookReturn->setId(1);
        $bookReturn->setUsuarioPublicador(1, "Bill");
        $bookReturn->setTitulo("Exemplo");

        $index = new Index();
        $index->setId(1);
        $index->setTitulo("Alfa");
        $index->setPagina(1);

        $subindice = new SubIndex();
        $subindice->setId(1);
        $subindice->setTitulo("Beta");
        $subindice->setPagina(1);

        $index->setSubIndex( $subindice );
        $bookReturn->setIndex($index);

        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('list')->andReturn($bookReturn);

        $return = $repository->list("Exemplo", "Beta");

        $this->assertNotNull($return);

        Mockery::close();
    }

    public function test_if_books_retorned(): void
    {
        $bookReturn = new Book();
        $bookReturn->setId(1);
        $bookReturn->setUsuarioPublicador(1, "Bill");
        $bookReturn->setTitulo("Exemplo");

        $index = new Index();
        $index->setId(1);
        $index->setTitulo("Alfa");
        $index->setPagina(1);

        $bookReturn->setIndex($index);

        $index = new Index();
        $index->setId(2);
        $index->setTitulo("Beta");
        $index->setPagina(1);

        $bookReturn->setIndex($index);


        $repository = Mockery::mock(BookEloquanteRepository::class);
        $repository->shouldReceive('listAll')->andReturn($bookReturn);

        $return = $repository->listAll();
        $this->assertNotNull($return);

    }
}
