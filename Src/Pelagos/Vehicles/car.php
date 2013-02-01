<?php
/**
 * car.php
 * Concrete class that implements a 'Car' object
 * 'Car' extends 'Vehicle' class and implements the 'VehicleInterface' interface
 */
use \Pelagos\Exceptions\ArgumentException as ArgumentException;

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
    $this->setNumberOfDoors($numberOfDoors);
    $this->setYear($year);
  }

  /**
   * Get the model year
   * return string
   */
  public function getYear() {
    return $this->_year;
  }

  /**
   * Set the model year
   * @param int
   */
  public function setYear($year) {
    if (strcmp(gettype($year), "integer") != 0) {
      throw new \Pelagos\Exceptions\ArgumentException("Invalid type for 'year': (" . gettype($year) . ") Must be 'integer'");
    }
    if ($year < 1900 || $year > 2100) {
      throw new \Pelagos\Exceptions\ArgumentException("Invalid value for 'year': (" . $year . ") Year must fall between 1900 and 2100, inclusive");
    }
    $this->_year = $year;
  }

  /**
   * Returns number of doors
   * return int
   */
   public function getNumberOfDoors() {
    return $this->_numberOfDoors;
  }

  /**
   * Set the number of doors on the Car
   * @param int
   */
  public function setNumberOfDoors($numberOfDoors) {
    if (strcmp(gettype($numberOfDoors), "integer") != 0) {
      throw new \Pelagos\Exceptions\ArgumentException("Invalid type for 'numberOfDoors': (" . gettype($numberOfDoors) . ") Must be 'integer'");
    }
    if ($numberOfDoors < 1 || $numberOfDoors > 12) {
      throw new \Pelagos\Exceptions\ArgumentException("Invalid number of doors: (" . $numberOfDoors . ") Number of doors must be between 1 and 12, inclusive");
    }
    $this->_numberOfDoors = $numberOfDoors;
  }
}

