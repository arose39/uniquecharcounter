<?php declare(strict_types=1); ?>
<?php

require_once realpath("vendor/autoload.php");

use UniqueCharactersCounterApp\AnswerCacheSaver;
use UniqueCharactersCounterApp\PreviousAnswerLoader;
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
<?php
$string = filter_input(INPUT_GET, 'string');
if ($string) {
        print('<h3>' . $uniqueCharactersCounter->count($string) . '</h3>');
}
?>
</body>
</html>



