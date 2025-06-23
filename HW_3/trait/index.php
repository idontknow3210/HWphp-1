<?php
trait AppUserAuthentication 
{
  private string $appUser="UserApp";
  private string $appPassword="UserApp1234";
  public function authenticate () {
    echo "Вход выполнен, как «пользователь приложения»! ";
  }
}

trait MobileUserAuthentication 
{
  private string $mobileUser="UserMob";
  private string $mobilePassword="UserMob1234";
  public function authenticate () {
    echo "Вход выполнен, как «пользователь мобильного приложения»! ";
  }
}

class Human 
{
  public string $login;
  public string $password;
  use AppUserAuthentication, MobileUserAuthentication {
    AppUserAuthentication::authenticate insteadOf MobileUserAuthentication;
    MobileUserAuthentication::authenticate as authenticateMob;
  }
  public function __construct(string $login, string $password) {
    $this->login = $login;
    $this->password = $password;
  }
  public function entrance () {
    if (($this->appUser===$this->login)&&($this->appPassword===$this->password)) {
      $this->authenticate();
    } elseif (($this->mobileUser===$this->login)&&($this->mobilePassword===$this->password)) {
      $this->authenticateMob();
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

$human = new Human("UserApp", "UserApp1234");


$human->entrance();
