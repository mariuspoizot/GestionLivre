<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function create (Request $request, EntityManagerInterface $entityManager){
        $book =new Book();
        $author=new Author();
        $editor=new Editor();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();
           
        }
        return $this->render('form/form.html.twig', [
            'form'=> $form->createView(),
            'author'=> $author ,
            'editorid'=> $editor
        ]);
    }
        
    }

