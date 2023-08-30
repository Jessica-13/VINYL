<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response 
    {
        $tracks = [ // example
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        // dd($tracks); // dump and die : to look at variables 
        /*
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'T & J',
            'tracks' => $tracks,
        ]);*/

        $html = $twig->render('vinyl/homepage.html.twig', [
            'title' => 'T & J',
            'tracks' => $tracks,
        ]);

        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'app_browse')] # slug is just a common 
    public function browse(string $slug = null): Response 
    {
        /*
        if ($slug) {
            $title = 'Browse to : ' .u(str_replace('-',' ', $slug))->title(true);
        } else {
            $title = 'All';
        }
        return new Response($title);
        */

        $genre = $slug ? u(str_replace('-',' ', $slug))->title(true) : null;
        
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}