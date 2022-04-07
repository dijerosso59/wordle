<?php

class Letter {
  private string $word;
  private int $position;

  public string $value;
  public string $color = 'red';

  public function __construct(string $value, string $word, int $position) {
    $this->value = $value;
    $this->word = $word;
    $this->position = $position;

    $this->check();
  }

  private function check(): void {
    if (!$this->isInWord()) return;
    $this->color = 'yellow';
    
    if (!$this->isAtCorrectPosition()) return;
    $this->color = 'greenyellow';
  }

  private function isInWord(): bool {
    return strpos($this->word, $this->value) !== false;
  }

  private function isAtCorrectPosition(): bool {
    return $this->value === str_split($this->word)[$this->position];
  }
}