<?php

namespace App\Controller;

use Symfony\Component\DependencyInjection\LazyProxy\Instantiator\RealServiceInstantiator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IndexController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;


    }

    /**
     * @Route("/", name="app_index_controller")
     */
    public function __invoke(Request $request)
    {

        $name = $request->query->get('name');
        $content = $this->twig->render("index.html.twig", ['name'=> $name]);


        return new Response($content);

    }
}



