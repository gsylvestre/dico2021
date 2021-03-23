<?php

namespace App\Controller;

use App\Entity\Term;
use App\Repository\TermRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermController extends AbstractController
{
    /**
     * @Route("/tous-les-mots/", name="term_list")
     */
    public function list(TermRepository $termRepository): Response
    {
        $terms = $termRepository->findAll();

        return $this->render('term/list.html.twig', [
            "terms" => $terms
        ]);
    }

    /**
     * @Route("/term/create/demo", name="term_create_demo")
     */
    public function createDemo(EntityManagerInterface $entityManager)
    {
        //instanciation d'un nouveau terme du dictionnaire
        $term = new Term();

        //hydrate toutes les propriétés
        //(donner une valeur)
        $term->setSlug('poupoutine2');
        $term->setTerm('Poupoutine2');
        $term->setOrigin('dlafjdkl 2 2  2 ');
        $term->setIsPublished(true);
        $term->setDateCreated(new \DateTime());

        //on sauvegarde cette instance svp !
        $entityManager->persist($term);

        //et on exécute la requête maintenant
        $entityManager->flush();

        //pour supprimer
        //$entityManager->remove($term);
        //$entityManager->flush();

        die("ok");
    }

}
