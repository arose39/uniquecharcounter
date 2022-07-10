<?php

namespace UniqueCharactersCounterApp;

interface CacheSaver
{
    public function save(string $string, int $answer): void;

    public function get(string $string): null|int;

}