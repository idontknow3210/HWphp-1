<?php
echo "Имя файла".__FILE__;
echo " Строка".__LINE__;

$a='Рыба';
$b='человек';

echo <<<END

$a рыбою сыта, а $b человеком
END;
?>