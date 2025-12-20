<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Redirect404Subscriber implements EventSubscriberInterface
{
    public function __construct(
        private UrlGeneratorInterface $router
    ) {}

    public static function getSubscribedEvents(): array
    {
        // Слушаме за всякакви грешки (Exceptions) в системата
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        // Проверяваме дали грешката е "Няма такъв път" (404)
        if ($exception instanceof NotFoundHttpException) {

            // Създаваме отговор, който пренасочва към 'app_home' (начална страница)
            $response = new RedirectResponse($this->router->generate('app_home'));

            // Казваме на Symfony да изпълни този отговор вместо да показва грешката
            $event->setResponse($response);
        }
    }
}
