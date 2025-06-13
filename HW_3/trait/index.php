<?php

trait AppUserAuthentication 
{
  private string $appUser="UserApp";
  private string $appPassword="UserApp1234";
  public function authenticateAPP () {
    if (($this->appUser===$this->login)&&($this->appPassword===$this->password)) {
        echo "Вход выполнен, как «пользователь приложения»! ";
      } else {
        echo "Попытка входа, как «пользователь приложения»! ";
      }
  }
}

trait MobileUserAuthentication 
{
  private string $mobileUser="UserMob";
  private string $mobilePassword="UserMob1234";
  public function authenticateMOB () {
    if (($this->mobileUser===$this->login)&&($this->mobilePassword===$this->password)) {
        echo "Вход выполнен, как «пользователь мобильного приложения»! ";
      } else {
        echo "Попытка входа, как «пользователь мобильного приложения»! ";
      }
  }
}

class Human 
{
  public string $login;
  public string $password;
  use AppUserAuthentication, MobileUserAuthentication;
  public function __construct(string $login, string $password) {
    $this->login = $login;
    $this->password = $password;
  }
  public function entrance ($typeEntrance) {
    if ($typeEntrance==="AppUserAuthentication") {
      $this->authenticateAPP();
    } elseif ($typeEntrance==="MobileUserAuthentication") {
      $this->authenticateMOB();
    } else {
      echo "Неизвестный источник! ";
    }
  }
}

//APP---
//log - "UserApp"
//pass - "UserApp1234"

//MOB---
//log - "UserMob"
//pass - "UserMob1234"

$human = new Human("UserMob", "UserMob1234");

// Ключи входа: 
// "AppUserAuthentication" - обычное устройство(APP)
// "MobileUserAuthentication" - мобильное устройство(MOB)

$human->entrance("MobileUserAuthentication");
