<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class Controller
{
    /**
     * @Route("/")
     */
    public function __invoke(UrlGeneratorInterface $urlGenerator)
    {
        return new RedirectResponse($urlGenerator->generate('symfonycasts.messenger_monitor.dashboard'));
    }
}
