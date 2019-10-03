<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
      /**
       * @var PropertyRepository
       */
      private $repository;

      public function __construct(PropertyRepository $repository)
      {
            $this->repository = $repository;

      }

      /**
       * @Route("/",name="home")
       *
       * @return \Symfony\Component\HttpFoundation\Response
       */
      public function index()
      {
            $properties = $this->repository->findLatest();
            return $this->render('pages/home.html.twig', [
                  'current_menu' => 'properties',
                  'properties' => $properties
            ]);
      }
}


 ?>
