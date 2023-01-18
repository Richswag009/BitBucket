<?php

if(isset($_POST['submit'])){
    require_once("signupconfig.php");
    $sc = new SignUpConfig();

    $sc->setFirstName($_POST['firstname']);
    $sc->setlastName($_POST['lastname']);
    $sc->setAddress($_POST['address']);

  $scrt = $sc->insertData();
  
}


