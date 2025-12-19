<?php

namespace App\Service;

use Symfony\Component\HtmlSanitizer\HtmlSanitizerInterface;

class HtmlSanitizerService
{
    public function __construct(
        private HtmlSanitizerInterface $htmlSanitizer
    ) {
    }

    /**
     * Sanitize HTML content to prevent XSS attacks
     * Removes dangerous tags like <script>, <iframe>, onclick attributes, etc.
     */
    public function sanitize(string $html): string
    {
        return $this->htmlSanitizer->sanitize($html);
    }

    /**
     * Sanitize HTML but allow safe formatting tags
     * For product descriptions and content
     */
    public function sanitizeForDisplay(string $html): string
    {
        // The default sanitizer already allows safe tags like:
        // <p>, <div>, <h1>-<h6>, <ul>, <ol>, <li>, <strong>, <em>, etc.
        // And removes dangerous ones like <script>, <iframe>, onclick, etc.
        return $this->htmlSanitizer->sanitize($html);
    }
}
