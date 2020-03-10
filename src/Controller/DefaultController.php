<?php

namespace App\Controller;

use App\Util\ExampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/call", name="call")
     */
    public function call()
    {
        // illustrate how __call workds
        $exampleRepository = new ExampleRepository();

        $html = "<pre>";
        $html .=  "----- calling findAll() -----\n";
        $html .= $exampleRepository->findAll();

        $html .=  "\n\n----- calling findAllByProperty() -----\n";
        $html .= $exampleRepository->findByName('matt', 'smith');

        $html .=  "\n----- calling badMethodName() -----\n";
        $html .= $exampleRepository->badMethodName('matt', 'smith');

        return new Response($html);
    }




}
