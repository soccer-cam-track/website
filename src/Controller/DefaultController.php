<?php

namespace App\Controller;

use App\Data\Events;
use App\Data\People;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    #[Route('/people', name: 'people')]
    public function people(): Response
    {
        return $this->render('default/people.html.twig', [
            'people' => People::people
        ]);
    }

    #[Route('/event/{event}', name: 'event')]
    public function event(string $event): Response
    {
        return $this->render('default/event.html.twig', [
            'event' => Events::getEvents()[$event]
        ]);
    }

    #[Route('/eventsMenu', name: 'events_menu')]
    public function eventsMenu()
    {
        return $this->render('_events_menu.html.twig', [
            'events' => Events::getEvents()
        ]);
    }
}
