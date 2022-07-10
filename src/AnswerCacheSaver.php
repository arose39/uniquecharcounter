<?php

namespace UniqueCharactersCounterApp;

class AnswerCacheSaver implements CacheSaver
{
    public function save(string $string, int $answer): void
    {
        $content = json_encode(["$string", $answer]);
        file_put_contents("cache/cache.txt", $content);
    }

    public function get(string $string): null|int
    {
        $content = json_decode(file_get_contents("cache/cache.txt"));
        if ($content) {
            $previousQuery = $content[0];
            $previousAnswer = $content[1];
        } else {
            $previousQuery = null;
        }
        if ($previousQuery == $string) {
            return $previousAnswer;
        } else {
            return null;
        }
    }

}