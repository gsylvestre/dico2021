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
        $yo = ["dasf" => 12323232, "dsaffd" => [543432, 4324, 123123]];

        //dd($yo);

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