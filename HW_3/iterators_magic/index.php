<?php
declare(strict_types=1);

require_once "autoload.php";

use src\{Person, PeopleList};

$person = new Person('Joel ', 'pass');

echo $person->login; 
echo $person->age; 
$person->name = 'Ellie'; 
$person->password = 'j0e!'; 
echo $person; 

$serializedPerson = serialize($person); 
echo "Serialized: " . $serializedPerson;

$modifiedSerializedPerson = str_ireplace(['joel ', 'j0e!'], ['ellie', 'e!lY'], $serializedPerson); 
echo "Modified Serialized: " . $modifiedSerializedPerson;

$unserializedPerson = unserialize($modifiedSerializedPerson); 
echo "Unserialized: " . $unserializedPerson;

$peopleList = new PeopleList([
    new Person('Tommy ', 't0my!'),
    new Person('Sarah ', 's1r@h'),
    new Person('Bill ', 'b!pp'),
]);

foreach ($peopleList as $person) {
    echo $person;
}