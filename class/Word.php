<?php

class Word
{

  public function getRandom(): string
  {
    $words = file('../data/words.txt', FILE_IGNORE_NEW_LINES);
    return $words[array_rand($words)];
  }

}