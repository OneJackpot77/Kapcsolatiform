<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Kapcsolat;
use App\Form\KapcsolatFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\twig;
use Symfony\Component\HttpFoundation\Request;

class ConnectionController extends AbstractController
{
    /**
     * @Route("/show")
     */
    public function show(Environment $twig, Request $request,EntityManagerInterface $entityManagerInterface)
    {
      $kapcsolat = new Kapcsolat();
      $form = $this->createForm(KapcsolatFormType::class, $kapcsolat);

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid())
      {
         $entityManagerInterface->persist($kapcsolat);
         $entityManagerInterface->flush();

         return new Response('Köszönjük szépen a kérdésedet.
         Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
      }

      return new Response($twig->render('kapcsolat/show.html.twig',[
    'kapcsolat_form' => $form->createView()
    ]));
    }
}
