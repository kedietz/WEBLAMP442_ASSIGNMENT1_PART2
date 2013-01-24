<?php
/**
 * Class definition for a 'Civic', which is a kind of 'Car'
 */
namespace Pelagos\Vehicles\Cars\Civic

class Civic extends \Pelagos\Vehicles\Cars\Car {
  /**
   * new Civic constructor
   * @param int numberOfDoors
   * @param string year (4 digit)
   */
  public function __construct($numberOfDoors, $year) {
     parent::__construct($numberOfDoors, $year);
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