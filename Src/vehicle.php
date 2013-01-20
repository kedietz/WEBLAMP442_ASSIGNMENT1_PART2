<?php
/**
 * vehicle.php
 * Abstract class to represent vehicle
 */
abstract class Vehicle {
  /**
   * Number of doors
   * @var int
   */
  protected $_numberOfDoors;

  /**
   * Return the number of doors
   * @return int
   */
  abstract public function getNumberOfDoors();

  /**
   * Provide the base implementation for vehicle 'honk' response
   * return string (empty)
   */
  public function honk() {
        return "";
  }
}
?>