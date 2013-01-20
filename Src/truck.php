<?php
/**
 * truck.php
 * Concrete class that implements a 'Truck' object
 * 'Truck' extends 'Vehicle' class and implements the 'VehicleInterface' interface
 */

require_once './vehicle.php';
require_once './vehicleinterface.php';

class Truck extends Vehicle implements VehicleInterface {
  /**
   * Year of manufacture
   * @var string
   */
    protected $_year;

  /**
   * new Truck constructor
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
?>
