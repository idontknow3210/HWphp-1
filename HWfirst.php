<?php
declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_PRINT = 2;
const OPERATION_DELETE = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
];

$operationNumber = "";
$items = [];

function search(callable $func, string &$arg_1, array $arg_2, string $arg_3) {
    for(;;) {
        if (!$func($arg_1, $arg_2)) {
            echo $arg_3 . PHP_EOL; 
            $arg_1 = trim(fgets(STDIN));    
        } else {
            break;
        }
    }
}

function conclusion (string $str, array $items) 
{
    echo $str . PHP_EOL;
    echo implode("\n", $items) . "\n";
}

function startOperation(array $operations, string &$operationNumber, array &$items) 
{
    if (count($items)) {
        conclusion('Ваш список покупок: ', $items);
        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        array_splice($operations, 3);
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> '; 
    }
    $operationNumber = trim(fgets(STDIN)); 
    search('array_key_exists', $operationNumber, $operations, '!!! Неизвестный номер операции, повторите попытку.');
}

function operationAdd(array &$items) 
{
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function operationDel(array &$items) 
{
    echo 'Текущий список покупок:' . PHP_EOL;
    conclusion('Список покупок: ', $items);
    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));
    search('in_array', $itemName, $items, 'Покупка не найдена, повторите запись:');

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
            echo "Покупка удалена!\n";
        }
    }
}
function operationPrint(array &$items) 
{
    conclusion('Ваш список покупок: ', $items);
    echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}


do {
    system('cls');
    startOperation($operations, $operationNumber, $items); 
    
    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            operationAdd($items);
            break;

        case OPERATION_DELETE:
            operationDel($items);
            break;

        case OPERATION_PRINT:
            operationPrint($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);