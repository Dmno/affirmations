<?php

namespace App\Service;

class AffirmationProvider
{
    public function __construct(
        private string $projectDir
    ) {
    }

    public function provide(): string
    {
        $affirmations = $this->readFile();
        $randomAffirmation = array_rand($affirmations);

        return $affirmations[$randomAffirmation];
    }

    private function readFile(): array
    {
        $affirmations = [];

        $file = fopen($this->projectDir . '/affirmations.csv', 'rb');

        while (($line = fgetcsv($file)) !== FALSE) {
            $affirmations[] = $line[0];
        }
        fclose($file);

        return $affirmations;
    }
}