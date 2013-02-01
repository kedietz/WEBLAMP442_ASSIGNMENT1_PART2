<?php
use \Pelagos\Vehicles\Trucks\Truck as Truck;
use \Pelagos\Exceptions\ArgumentException as ArgumentException;

class TruckTest extends PHPUnit_Framework_TestCase {
  /**
   * Unit tests that exercise Pelagos\Vehicles\Truck class
   */

  /**
   * Provide an array of parameters to use for testing a number of Truck methods
   *
   * Constructor interface:  public function __construct((int)$numberOfDoors, (4 digit)$year)
   */
  public static function truckConstruct_Provider() {
    return  array (
    /* numberOfDoors, year */
      array(1, 2012, 1, 2012),
      array(6, 2012, 6, 2012),
      array(0, 2012, "ArgumentException", 2012),
      array(7, 2012, "ArgumentException", 2012),
      array(-1, 2012, "ArgumentException", 2012),
      array(0.5, 2012, "ArgumentException", 2012),
      array(1.34, 2012, "ArgumentException", 2012),
      array(null, 2012, "ArgumentException", 2012),
      array("", 2012, "ArgumentException", 2012),
      array("2", 2012, "ArgumentException", 2012),
      array("-2", 2012, "ArgumentException", 2012),
      array("abc", 2012, "ArgumentException", 2012),
      // year tests
      array(2, null, 2, "ArgumentException"),
      array(2, "2011", 2, "ArgumentException"),
      array(2, 0, 2, "ArgumentException"),
      array(2, "abc", 2, "ArgumentException"),
      array(2, 2000.5, 2, "ArgumentException")
    );
  }

  /**
   * @dataProvider truckConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int year - year of manufacture
   * @Parameter int expected_numberOfDoors - resulting number of doors found after constructor call
   * @Parameter int expected_year - expected year of manufacture after constructor call
   */
  public function test_construct($numberOfDoors, $year, $expected_numberOfDoors, $expected_year) {
    try {
      $truck = new Truck($numberOfDoors, $year);
      $found_numberOfDoors = $truck->getNumberOfDoors();
      $found_year = $truck->getYear();
    } catch (ArgumentException $e) {
      $found_numberOfDoors = "ArgumentException";
      $found_year = "ArgumentException";
    }
    if (strcmp($expected_numberOfDoors, "ArgumentException") == 0) {
      $this->assertEquals($expected_numberOfDoors, $found_numberOfDoors);
    } else if (strcmp($expected_year, "ArgumentException") == 0) {
      $this->assertEquals($expected_year, $found_year);
    } else {
      $this->assertEquals($expected_numberOfDoors, $found_numberOfDoors);
      $this->assertEquals($expected_year, $found_year);
    }
  }

  /**
   * @dataProvider truckConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int nop - not used
   * @Parameter int expected_numberOfDoors - resulting number of doors found after call to setNumberOfDoors
   * @Parameter int nop2 - not used
   */
  public function test_setNumberOfDoors($numberOfDoors, $nop, $expected_numberOfDoors, $nop2) {
    try {
      $truck = new Truck(1,1900);
      $truck->setNumberOfDoors($numberOfDoors);
      $found_numberOfDoors = $truck->getNumberOfDoors();
    } catch (ArgumentException $e) {
      $found_numberOfDoors = "ArgumentException";
    }
    $this->assertEquals($expected_numberOfDoors, $found_numberOfDoors);
  }

  /**
   * @dataProvider truckConstruct_Provider
   * @Parameter int nop - not used
   * @Parameter int year - model year
   * @Parameter int nop2 - not used
   * @Parameter int expected_year - resulting model year after call to setYear
   */
  public function test_setYear($nop, $year, $nop2, $expected_year) {
    try {
      $truck = new Truck(1,1900);
      $truck->setYear($year);
      $found_year = $truck->getYear();
    } catch (ArgumentException $e) {
      $found_year = "ArgumentException";
    }
    $this->assertEquals($expected_year, $found_year);
  }

  public function test_honk() {
    $truck = new Truck(4,2010);
    $honk = $truck->honk();

    $this->assertEquals($honk, "");
  }
}
