<?php

declare(strict_types=1);
// ^^'
class staticDiffrences
{
    private string $value = 'POLICE';

    // pas static
    public function getRandom(): string
    {
        return $this->value;
    }

    // static
    public static function getRandom()
    {
        return self::$value;
    }
}

// pas static
$word = new Word();
$randomWord = $word->getRandom();

// static
$randomWord = Word::getRandom();
