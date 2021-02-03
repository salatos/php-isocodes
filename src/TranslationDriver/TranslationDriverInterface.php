<?php

declare(strict_types=1);

namespace Sokil\IsoCodes\TranslationDriver;

interface TranslationDriverInterface extends TranslatorInterface
{
    public function configureDirectory(string $isoNumber, string $directory);

    /**
     * @param string $locale
     */
    public function setLocale(string $locale);
}