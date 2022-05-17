<?php

declare(strict_types=1);

class Game
{
    public string $word;
    public array $trials = [];
    public string $state = 'en cours';

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function submit(array $inputs, $trials = null): void
    {
        $letters = [];
        $this->trials = $trials ?? [];

        foreach ($inputs as $position => $value) {
            $letters[] = new Letter($value, $this->word, $position);
        }

        $this->trials[] = $letters;

        $cookie = new Cookie();
        $cookie->setCookie('words', json_encode($this->trials));

        $this->setState();
    }

    private function setState(): void
    {
        if ($this->isWinning()) {
            $this->state = 'gagné';

            return;
        }

        if ($this->isLosing()) {
            $this->state = 'perdu';
            $cookie = new Cookie();
            $cookie->destroy('word');
            $cookie->destroy('words');

            return;
        }
    }

    private function isWinning(): bool
    {
        foreach (end($this->trials) as $letter) {
            if ('greenyellow' !== $letter->color) {
                return false;
            }
        }

        $cookie = new Cookie();
        $cookie->destroy('word');
        $cookie->destroy('words');

        return true;
    }

    private function isLosing(): bool
    {
        // du coup j'ai le droit à 7 essais :/
        return count($this->trials) > 6;
    }
}
