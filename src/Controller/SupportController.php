<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SupportController extends Controller
{
    /**
     * @Route("/support", name="support")
     */
    public function supportAction(SomeService $someService)
    {
        $someParameter = $this->container->getParameter('app.some.parameter');

        $someService->doSomethingWith($someParameter);

        // etc
    }
}
