<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermController extends AbstractController
{
    /**
     * @Route("/tous-les-mots/", name="term_list")
     */
    public function list(): Response
    {
        return $this->render('term/list.html.twig', [

        ]);
    }
}
