<?php
/**
 * Class definition for a 'Civic', which is a kind of 'Car'
 */
namespace Pelagos\Vehicles\Cars;

class Civic extends \Pelagos\Vehicles\Cars\Car {
  /**
   * new Civic constructor
   * @param int numberOfDoors
   * @param int year
   */
  public function __construct($numberOfDoors, $year) {
     parent::__construct($numberOfDoors, $year);
  }

  public function setYear($year) {
     if ($year < 1973) {
       throw new \Pelagos\Exceptions\ArgumentException("Invalid year is specified: (".$year.") The first model year of a Honda Civic was 1973");
     }
     parent::setYear($year);
  }

  public function setNumberOfDoors($numberOfDoors) {
     if ($numberOfDoors < 2 || $numberOfDoors > 5) {
       throw new \Pelagos\Exceptions\ArgumentException("Invalid number of doors: (".$numberOfDoors.") The Civic has only been available as 2, 3, 4 or 5 door models");
     }
     parent::setNumberOfDoors($numberOfDoors);
  }

  /**
   * Civic 'honk' response
   * return string
   */
  public function honk() {
      return "honk honk";
  }
}
?>