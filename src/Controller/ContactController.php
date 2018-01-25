<?php

namespace App\Controller;

use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        $this->addFlash('info', 'some info');

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            dump($contactFormData);

            // do something interesting

            $message = (new \Swift_Message('You got mail'))
                ->setFrom($contactFormData['email'])
                ->setTo('punchymistake@mailinator.com')
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
                )
            ;

            $mailer->send($message);

            $this->addFlash('success', 'message was sent');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
