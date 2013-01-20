<?php
require_once './car.php';
require_once './truck.php';
require_once './civic.php';

function testlog($message) {
  $outmsg = sprintf("%s %s ", $message, PHP_EOL);
  print $outmsg;
}

function test_car()
{
  testlog("Testing Car class ...");
  $myCar = new Car(4, "1997"); 
  testlog("myCar has " . $myCar->getNumberOfDoors() . " doors and was manufactured in " . $myCar->getYear());
  $myCar->setYear("1998");
  testlog("myCar was really manufactured in ". $myCar->getYear());
  testlog("myCar has a honk that sounds like: '" .$myCar->honk() . "'" );
}

function test_truck()
{
  testlog("Testing Truck class ...");

  $myTruck = new Truck(2, "1997");
  testlog("myTruck has " . $myTruck->getNumberOfDoors() . " doors and was manufactured in " . $myTruck->getYear());
  $myTruck->setYear("1998");
  testlog("myTruck was really manufactured in " . $myTruck->getYear());
  testlog("myTruck has a honk that sounds like: '" . $myTruck->honk() . "'");
}

function test_civic()
{
  // reset testlog line count.
  $logline_cnt = 0;

  testlog("Testing Civic class ...");

  $myCivic = new Civic(3, "1997");
  testlog("myCivic has " . $myCivic->getNumberOfDoors() . " doors and was manufactured in " . $myCivic->getYear());
  $myCivic->setYear("1998");
  testlog("myCivic was really manufactured in " . $myCivic->getYear());
  testlog("myCivic has a honk that sounds like: '" . $myCivic->honk() . "'");
}

test_car();

test_truck();

test_civic();

?>

