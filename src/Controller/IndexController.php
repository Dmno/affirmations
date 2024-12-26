<?php

namespace App\Controller;

use App\Service\AffirmationProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private AffirmationProvider $affirmationProvider,
    ) {
    }

    #[Route('/main')]
    public function main(): Response
    {
        // TODO write this into a json file and display from there
        // If the day has not changed dont randomize the string
        // If it did - update it
        $affirmation = $this->affirmationProvider->provide();

        return $this->render('base.html.twig', ['affirmation' => $affirmation]);
    }
}
