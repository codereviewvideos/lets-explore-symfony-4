<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig');
    }

    /**
     * @Route(
     *     "/hello-page/{name}",
     *     name="hello_page",
     *     defaults={"name" = "CodeReviewVideos.com"},
     *     requirements={"name" = "[A-Za-z]+"}
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello($name)
    {
        return $this->render(
            'hello_page.html.twig',
            [
                'name' => $name
            ]
        );
    }
}
