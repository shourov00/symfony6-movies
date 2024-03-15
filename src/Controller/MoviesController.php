<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Movie::class);

//        $movies = $repository->findBy([], ['id' => 'DESC']);
        // where id = 6 and title is iron man
//        $movies = $repository->findOneBy(['id' => 6, 'title' => 'Iron Man'], ['id' => 'DESC']);
//        $movies = $repository->count();
//        $movies = $repository->getClassName();
//
//        dd($movies);

        return $this->render('index.html.twig');
    }
}
