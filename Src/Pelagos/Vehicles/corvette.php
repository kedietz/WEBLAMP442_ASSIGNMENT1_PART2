<?php
/**
 * Class definition for a 'Corvette', which is a kind of 'Car'
 */
namespace Pelagos\Vehicles\Cars;

class Corvette extends \Pelagos\Vehicles\Cars\Car {
  /**
   * new Corvette constructor
   * @param int numberOfDoors
   * @param int year
   */
  public function __construct($numberOfDoors, $year) {
     parent::__construct($numberOfDoors, $year);
  }

  public function setYear($year) {
     if ($year < 1953) {
       throw new \Pelagos\Exceptions\ArgumentException("Invalid year is specified: (".$year.") The first model year of a Chevrolet Corvette was 1953");
     }
     parent::setYear($year);
  }

  public function setNumberOfDoors($numberOfDoors) {
     if ($numberOfDoors != 2) {
       throw new \Pelagos\Exceptions\ArgumentException("Invalid number of doors: (".$numberOfDoors.") The Corvette has only been available as 2 door models");
     }
     parent::setNumberOfDoors($numberOfDoors);
  }

  /**
   * Corvette 'honk' response
   * return string
   */
  public function honk() {
      return "BEEEP";
  }
}
?>