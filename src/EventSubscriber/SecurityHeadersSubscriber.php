<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SecurityHeadersSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $response = $event->getResponse();

        // Content Security Policy - Prevent XSS and injection attacks
        // Allow self, Bootstrap CDN, Google Fonts, and Chart.js CDN
        $response->headers->set('Content-Security-Policy',
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdn.jsdelivr.net/npm/chart.js; " .
            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com; " .
            "font-src 'self' https://cdn.jsdelivr.net https://fonts.gstatic.com; " .
            "img-src 'self' data: https: http:; " .
            "connect-src 'self'; " .
            "frame-ancestors 'none';"
        );

        // X-Frame-Options - Prevent clickjacking
        $response->headers->set('X-Frame-Options', 'DENY');

        // X-Content-Type-Options - Prevent MIME-sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Referrer-Policy - Control referrer information
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // X-XSS-Protection - Enable browser XSS protection (legacy browsers)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Strict-Transport-Security - Force HTTPS (only in production)
        if ($_ENV['APP_ENV'] === 'prod') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        // Permissions-Policy - Control browser features
        $response->headers->set('Permissions-Policy',
            'geolocation=(), microphone=(), camera=(), payment=()'
        );
    }
}
