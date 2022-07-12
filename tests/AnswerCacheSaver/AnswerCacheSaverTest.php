<?php

use UniqueCharactersCounterApp\AnswerCacheSaver;
use PHPUnit\Framework\TestCase;

class AnswerCacheSaverTest extends TestCase
{
    private AnswerCacheSaver $answerCacheSaver;

    protected function setUp(): void
    {
        $this->answerCacheSaver = new AnswerCacheSaver();
    }

    protected function tearDown(): void
    {
        unset($this->answerCacheSaver);
    }

    public function testSaveAnswer(): void
    {
        $string = "abc d";
        $answer = 4;
        $this->assertTrue($this->answerCacheSaver->save($string,$answer));
    }

    /**
     * @depends testSaveAnswer
     */
    public function testGetAnswer(): void
    {
        $string = "abc d";
        $expectedValue = 4;
        $actual = $this->answerCacheSaver->get($string);
        $this->assertEquals($expectedValue, $actual);
    }
}
