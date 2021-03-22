<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/", name="main_home")
     */
    public function home()
    {

        return $this->render("main/home.html.twig");
    }

    /**
     * @Route ("/test/pif", name="main_test")
     */
    public function test()
    {
        $name = "yoyo";
        $deux = "pifpaf";

        return $this->render("main/test.html.twig", [
            "name" => $name,
            "deux" => $deux
        ]);
    }
}