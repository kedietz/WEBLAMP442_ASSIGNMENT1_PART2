<?php
/**
 * car.php
 * Concrete class that implements a 'Car' object
 * 'Car' extends 'Vehicle' class and implements the 'VehicleInterface' interface
 */

namespace Pelagos\Vehicles\Cars;

class Car extends \Pelagos\Vehicles\Vehicle implements \Pelagos\Vehicles\VehicleInterface {
  /**
   * Year of manufacture
   * @var string
   */
    protected $_year;

  /**
   * new Car constructor
   * @param int numberOfDoors
   * @param string year (4 digit)
   */
  public function __construct($numberOfDoors, $year) {
    $this->_numberOfDoors = $numberOfDoors;
    $this->_year = $year;
  }

  /**
   * Get the year of manufacture
   * return string
   */
  public function getYear() {
    return $this->_year;
  }

  /**
   * Set the year of manufacture
   * @param string (4 digit year)
   */
   public function setYear($year) {
    $this->_year = $year;
  }

  /**
   * Returns number of doors
   * return int
   */
   public function getNumberOfDoors() {
    return $this->_numberOfDoors;
  }
}

