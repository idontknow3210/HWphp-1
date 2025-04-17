<?php

echo "Любые введенные числа с плавющей точкой, будут округлены в меньшую сторону!\n";

fscanf(STDIN, "%d\n", $stdin1) && is_int($stdin1) ?: fwrite(STDERR, "Введите пожалуйста число") && exit;
fscanf(STDIN, "%d\n", $stdin2) && is_int($stdin2) ?: fwrite(STDERR, "Введите пожалуйста число") && exit;
$stdin = [$stdin1, $stdin2];

if ($stdin2===0) {
    fwrite(STDERR, "На ноль делить нельзя!");
    exit;
}

$result = [];

foreach ($stdin as $el) {
        array_push($result, $el);
} 

$stdout = $result[0] / $result[1];

fwrite(STDOUT, "Ответ: $stdout");

?>