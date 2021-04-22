<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\DBAL\Abstraction\Result;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{


    /**
     * @Route("/home", name="app_book", methods={"GET"})
     *
     * @return Response
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();
        //dd($books);
        return $this->render('book/book.html.twig', [
            'books' => $books
        ]);
    }

        /**
     * @Route("/detail/{id}", name="app_book_detail", methods={"GET"})
     *
     * @return response
     */
    public function detail($id): Response
    { 
        $book = $this->getDoctrine()->getRepository(book::class)->find($id);
        //dd($book);
        return $this->render('book/detail.html.twig', [
            'book' => $book
        ]);
    }


    /**
     * @Route("/book", name="app_book_test", methods={"GET"})
     */
    public function test(): Response
    {
        $data = [
            ["name" => "avion",
            "action" => "vol dans les airs"],

            ["name" => "bateau",
            "action" => "vogue sur les flots"]

        ];
        //dd($data);
        return $this->render('book/index.html.twig', [
            'data' => $data
        ]);
    }

    /**
     * @Route(
     * "/book/message/{texte}", 
     * name="app_book_message",
     * requirements={"texte"="[a-z-A-Z]+"},
     * methods={"GET"})
     * 
     * 
     */
    public function message(string $texte=''): Response
    {
        return new Response("Voici le message: $texte");
    }

        /**
     * @Route(
     * "/book/messagejson/{texte}", 
     * name="app_book_message_json",
     * methods={"GET"})
     * 
     * 
     */
    public function messagejson(string $texte=''): JsonResponse
    {
        $tab = [
            'titre' => 'Le titre',
            'msg' => $texte
        ];
        return new JsonResponse($tab);
    }
}
