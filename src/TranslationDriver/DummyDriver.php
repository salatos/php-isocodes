<?php

declare(strict_types=1);

namespace Sokil\IsoCodes\TranslationDriver;

/**
 * This driver may be used, when localisation of names does not required, and only database of codes is required.
 */
class DummyDriver implements TranslationDriverInterface
{
    public function configureDirectory(string $isoNumber, string $directory)
    {
        // do nothing
    }

    public function setLocale(string $locale)
    {
        // do nothing
    }

    /**
     * @param string $isoNumber
     * @param string $message
     *
     * @return string
     */
    public function translate(string $isoNumber, string $message): string
    {
        return $message;
    }
}