<?php

namespace UniqueCharactersCounterApp;

use UniqueCharactersCounterApp\CacheSaver;

class AnswerCacheSaver implements CacheSaver
{
    public function save(string $string, int $answer): bool
    {
        $content = serialize(['string'=>"$string", 'answer'=>$answer]);
        if(file_put_contents("cache/cache.txt", $content)){
            return true;
        }else{
            return false;
        };
    }

    public function get(string $string): null|int
    {
        $content = unserialize(file_get_contents("cache/cache.txt"));
        if ($content) {
            $previousQuery = $content['string'];
            $previousAnswer = $content['answer'];
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
