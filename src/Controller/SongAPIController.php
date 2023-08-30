<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongAPIController extends AbstractController
{                                                                                                      // <\d+> : meaning : a digit of any leght
    #[Route('api/songs/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]                       // id : will be the database id of the song                 
    public function getSong(int $id, LoggerInterface $logger): Response     // this is a service : LoggerInterface $logger
    {
        // dd($id);             // for debug

        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];
        
        $logger->info('Returning API response for song {song}', [
            'song' => $id,
        ]);

        return new JsonResponse($song);     // click on ctrl to open the code of the library
        //return $this=>json($song);          // another possibility using the shortcut of AbstractController
    }
}