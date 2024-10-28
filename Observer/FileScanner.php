<?php

namespace Observer;

class FileScanner
{
    private array $observers = [];

    public function registerObserver(ObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    private function notifyObservers(string $word): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($word);
        }
    }

    public function scan(string $filePath): void
    {
        $content = file_get_contents($filePath);
        $words = preg_split('/\s+/', $content);

        foreach ($words as $word) {
            $this->notifyObservers($word);
        }
    }
}
