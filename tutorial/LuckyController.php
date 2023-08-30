<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    # Controllers ----------------------------------------------------
    #[Route('/lucky/number/{max<\d+>?13}', name: 'app_lucky_number')]
    public function number(int $max, LoggerInterface $logger): Response
    {
        $number = random_int(0, $max);
        $logger->info('TRY');
        /*# Logger ----------------------------------------------------
        $logger->info('I just got the logger');
        $logger->error('An error occurred');
        $logger->critical('I left the oven on!', [
            // include extra "context" info in your logs
            'cause' => 'in_hurry',
        ]);
        # -----------------------------------------------------------*/

        # the handy render() method to render a template - before was : 
        return new Response('<html><body>Lucky number: '.$number.'</body></html>');
    }
    # ----------------------------------------------------------------

    /*
    public function index(): RedirectResponse
    {
        // redirects to the "homepage" route
        #return $this->redirectToRoute('homepage');

        // redirectToRoute is a shortcut for:
        // return new RedirectResponse($this->generateUrl('homepage'));

        // does a permanent HTTP 301 redirect
        #return $this->redirectToRoute('homepage', [], 301);
        // if you prefer, you can use PHP constants instead of hardcoded numbers
        #return $this->redirectToRoute('homepage', [], Response::HTTP_MOVED_PERMANENTLY);

        // redirect to a route with parameters
        #return $this->redirectToRoute('app_lucky_number', ['max' => 10]);

        // redirects to a route and maintains the original query string parameters
        #return $this->redirectToRoute('blog_show', $request->query->all());

        // redirects to the current route (e.g. for Post/Redirect/Get pattern):
        #return $this->redirectToRoute($request->attributes->get('_route'));

        // redirects externally
        #return $this->redirect('http://symfony.com/doc');
    }
    */

}