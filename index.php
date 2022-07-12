<?php declare(strict_types=1); ?>
<?php

require_once realpath("vendor/autoload.php");

use UniqueCharactersCounterApp\AnswerCacheSaver;
use UniqueCharactersCounterApp\UniqueCharactersCounter;

$answerCacheSaver = new AnswerCacheSaver();
$uniqueCharactersCounter = new UniqueCharactersCounter($answerCacheSaver);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unique characters counter</title>
</head>
<body>
<h4>Введите строку для подсчета в ней уникальных символов (не считая пробелы).</h4>
<form action="index.php" method="get">
    <input type="text" name="string" value="<?php if ($_GET) {
        echo($_GET['string']);
    } ?>">
    <input type="submit">
</form>
<h1>
    Уникальных символов в строке:
    <?php
    $string = filter_input(INPUT_GET, 'string');
    if ($string) {
        print $uniqueCharactersCounter->count($string);
    }
    ?>
</h1>
<h3>Текст для проверки быстродействия</h3>
<h4>скопируйсте его в поле для ввода и добавьте несколько разных символов, которых нет в тексте (например 12345)</h4>
<h4>После получения ответа, нажмите еще раз кнопку "отправить" и сравните время получения ответа</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dignissimos harum, hic laborum quisquam reiciendis? A
    accusantium blanditiis, ducimus earum eius enim eos, harum ipsum labore non nulla, odio quaerat rem sequi tenetur
    veniam voluptatem voluptatibus. Architecto delectus non sit. Architecto dolores, molestiae possimus reiciendis
    reprehenderit sapiente? Consequatur corporis ea excepturi numquam officia quod voluptatibus? Aspernatur reiciendis
    repellendus ut voluptatum! Aspernatur at autem, distinctio dolore earum mollitia qui. Aspernatur at autem culpa
    delectus dignissimos distinctio dolor dolore doloremque dolores eligendi facere fugiat id illo impedit inventore
    labore laborum laudantium magnam maxime minus neque, non nostrum officia optio provident quasi qui quidem quisquam
    quo quos, reiciendis reprehenderit sed similique soluta tenetur voluptas, voluptatum. Accusamus accusantium aliquam
    consectetur consequatur debitis, deserunt dicta eum ex excepturi expedita facere id illo inventore ipsa ipsam ipsum
    laboriosam natus neque optio placeat suscipit ullam veritatis. A aperiam consequatur deleniti dignissimos eaque,
    enim error esse ex excepturi illo impedit laudantium libero maiores minus necessitatibus, nobis nostrum placeat
    provident quia quidem quisquam ratione repellat sed sit totam voluptate voluptates voluptatibus. Animi assumenda at
    blanditiis cumque deleniti dolore dolores laborum, libero minus necessitatibus, non nulla possimus praesentium, quia
    ratione repellat repellendus repudiandae tenetur vel veniam vitae voluptas voluptatem voluptatibus. Assumenda beatae
    deserunt dicta facere numquam obcaecati possimus quae quia quod sed! Asperiores beatae corporis, dolorem doloremque
    eaque exercitationem impedit incidunt libero mollitia, nesciunt omnis praesentium provident quaerat quasi
    repudiandae saepe sapiente sed similique ut vitae? </p>
</body>
</html>