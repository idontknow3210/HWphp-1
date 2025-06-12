<?php
require_once("./CustomException.php");

function calculate($a): void
{
  throw new CustomException($a);
}

try {
  calculate("ds");
} catch (CustomException $e) {
  echo $e;
}