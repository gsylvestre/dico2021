<?php

namespace App\Controller;

use App\Entity\Term;
use App\Form\TermType;
use App\Repository\TermRepository;
use App\Repository\UsageEvolutionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

class TermController extends AbstractController
{
    /**
     * @Route("/contribuer/", name="term_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
        //crée une instance de l'entité que le form sert à créer
        $term = new Term();

        //crée une instance de la classe de formulaire
        //on associe cette entité à notre formulaire !
        $termForm = $this->createForm(TermType::class, $term);

        //prend les données du formulaire soumis, et les injecte dans mon $term
        $termForm->handleRequest($request);

        //si le formulaire est soumis...
        if ($termForm->isSubmitted() && $termForm->isValid()){
            //hydrate les propriétés qui sont encore null
            $term->setDateCreated(new \DateTime());

            //le composant String de symfony me permet de convertir en chaîne normalisée
            $slugger = new AsciiSlugger();
            $slug = $slugger->slug( $term->getTerm() )->lower();
            $term->setSlug($slug);

            //sauvegarde en bdd !
            $entityManager->persist($term);
            $entityManager->flush();

            $this->addFlash("success", "Votre terme a bien été enregistré !");

            //redirige vers une autre page, ou vers la page actuelle pour vider le form
            return $this->redirectToRoute("term_new");
        }

        return $this->render("term/new.html.twig", [
            //passe l'instance à twig pour affichage
            "termForm" => $termForm->createView()
        ]);
    }


    /**
     * @Route("/dictionnaire/{slug}", name="term_detail")
     */
    public function detail(TermRepository $termRepository, string $slug): Response
    {
        $term = $termRepository->findOneBy(["slug" => $slug]);

        return $this->render('term/detail.html.twig', [
            "term" => $term
        ]);
    }

    /**
     * @Route("/tous-les-mots/", name="term_list")
     */
    public function list(TermRepository $termRepository): Response
    {
        $terms = $termRepository->findBy(["is_published" => true], ["term" => "ASC"], 200);

        return $this->render('term/list.html.twig', [
            "terms" => $terms
        ]);
    }

    /**
     * @Route("/term/create/demo", name="term_create_demo")
     */
    public function createDemo(EntityManagerInterface $entityManager, UsageEvolutionRepository $usageEvolutionRepository)
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

        //pour sauvegarder la relation
        $usageEvolution = $usageEvolutionRepository->findOneBy(["name" => "stable"]);
        $term->setUsageEvolution($usageEvolution);

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
