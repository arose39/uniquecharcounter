<?php

use PHPUnit\Framework\TestCase;
use UniqueCharactersCounterApp\AnswerCacheSaver;
use UniqueCharactersCounterApp\UniqueCharactersCounter;

class UniqueCharactersCounterTest extends TestCase
{
    private AnswerCacheSaver $answerCacheSaver;
    private UniqueCharactersCounter $uniqueCharactersCounter;

    protected function setUp(): void
    {
        $this->answerCacheSaver = new AnswerCacheSaver();
        $this->uniqueCharactersCounter = new UniqueCharactersCounter($this->answerCacheSaver);
    }

    protected function tearDown(): void
    {
        unset($this->uniqueCharactersCounter);
        unset($this->answerCacheSaver);
    }

    /**
     * @dataProvider charactersSetsProvider
     */
    public function testCountUniqueCharacters($string, $expectedAnswer): void
    {
        $actual = $this->uniqueCharactersCounter->count($string);
        $this->assertEquals($expectedAnswer, $actual);
    }

    public function charactersSetsProvider(): array
    {
        return [
            'only unique chars string' =>
                ['abcd', 4],
            'divided only unique chars string' =>
                ['ab cd', 4],
            'one unique char string' =>
                ['aaac', 1],
            'only non-unique chars string' =>
                ['abcabc', 0],
            'string with spacec and non-alphabetic symbols' =>
                ['abc, 1', 5],
            'very long string' =>
                ['Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dignissimos harum, hic laborum quisquam reiciendis? A accusantium blanditiis, ducimus earum eius enim eos, harum ipsum labore non nulla, odio quaerat rem sequi tenetur veniam voluptatem voluptatibus. Architecto delectus non sit. Architecto dolores, molestiae possimus reiciendis reprehenderit sapiente? Consequatur corporis ea excepturi numquam officia quod voluptatibus? Aspernatur reiciendis repellendus ut voluptatum! Aspernatur at autem, distinctio dolore earum mollitia qui. Aspernatur at autem culpa delectus dignissimos distinctio dolor dolore doloremque dolores eligendi facere fugiat id illo impedit inventore labore laborum laudantium magnam maxime minus neque, non nostrum officia optio provident quasi qui quidem quisquam quo quos, reiciendis reprehenderit sed similique soluta tenetur voluptas, voluptatum. Accusamus accusantium aliquam consectetur consequatur debitis, deserunt dicta eum ex excepturi expedita facere id illo inventore ipsa ipsam ipsum laboriosam natus neque optio placeat suscipit ullam veritatis. A aperiam consequatur deleniti dignissimos eaque, enim error esse ex excepturi illo impedit laudantium libero maiores minus necessitatibus, nobis nostrum placeat provident quia quidem quisquam ratione repellat sed sit totam voluptate voluptates voluptatibus. Animi assumenda at blanditiis cumque deleniti dolore dolores laborum, libero minus necessitatibus, non nulla possimus praesentium, quia ratione repellat repellendus repudiandae tenetur vel veniam vitae voluptas voluptatem voluptatibus. Assumenda beatae deserunt dicta facere numquam obcaecati possimus quae quia quod sed! Asperiores beatae corporis, dolorem doloremque eaque exercitationem impedit incidunt libero mollitia, nesciunt omnis praesentium provident quaerat quasi repudiandae saepe sapiente sed similique ut vitae? Dolore laborum officiis quod saepe sequi soluta. Consectetur deserunt dolorem earum eos error facere harum hic ipsa minima modi non obcaecati pariatur quia repellendus, rerum. Amet aspernatur, at consectetur ducimus earum explicabo facere, hic iusto laudantium nobis quasi qui sapiente similique voluptas voluptate. A aliquid, consequuntur delectus, dicta illum ipsum iste laborum laudantium officiis omnis perspiciatis quod, suscipit. Corporis, delectus distinctio id labore nihil tenetur voluptate. A accusantium aperiam architecto assumenda, beatae commodi culpa cum cupiditate ea earum esse est ex fugiat ipsum iusto laboriosam libero magnam non optio perferendis possimus quaerat quasi quibusdam reiciendis rem sapiente sed sint ullam veritatis voluptate. Adipisci, autem dicta dolor eaque, eos eveniet exercitationem id in incidunt maxime nobis quis quo quos reprehenderit tempora tenetur veniam? Animi aspernatur atque, blanditiis doloremque eaque eius enim eos, fuga ipsa iusto magni nostrum qui quia quidem quisquam reiciendis repellendus reprehenderit sed! Asperiores autem cumque eligendi est, harum illo labore laborum, mollitia neque omnis provident quas quia quisquam quo repellat, repellendus ullam?', 2]
        ];
    }

    public function testCountUniqueCharactersWithNull(): void
    {
        $this->expectException(TypeError::class);
        \trigger_error($this->uniqueCharactersCounter->count(null));
    }
}
