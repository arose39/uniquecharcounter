<?php

namespace UniqueCharactersCounterApp;

class UniqueCharactersCounter
{
    private AnswerCacheSaver $answerCacheSaver;

    public function __construct($answerCacheSaver)
    {
        $this->answerCacheSaver = $answerCacheSaver;
    }

    public function count(string $string): int
    {
        $stringWithoutSpaces = $this->replaceSpaces($string);
        if ($this->answerCacheSaver->get($stringWithoutSpaces)) {
            return $this->answerCacheSaver->get($stringWithoutSpaces);
        }
        $charactersSet = new CustomCollection(str_split($stringWithoutSpaces));
        $uniqueCharsSum = 0;
        foreach ($charactersSet as $character) {
            $count = 0;
            for ($i = count($charactersSet); $i > 0; $i--) {
                if ($charactersSet[$i - 1] == $character) {
                    $count++;
                }
            }
            if ($count == 1) {
                $uniqueCharsSum++;
            }
        }
        $this->answerCacheSaver->save($stringWithoutSpaces, $uniqueCharsSum);

        return $uniqueCharsSum;
    }

    private function replaceSpaces(string $string): string
    {
        $stringWithoutSpaces = str_replace(" ", '', $string);

        return $stringWithoutSpaces;
    }
}
