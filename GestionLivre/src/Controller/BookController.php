<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
#[Route('/book/{id}', name: 'app_book')]
    public function person(BookRepository $bookRepository , $id): Response{
        $books = $bookRepository->find($id);
        return $this->render('book/book.html.twig', [
            'book'=> $books
        ]);
    }
}