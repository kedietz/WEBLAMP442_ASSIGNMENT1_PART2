<?php
use \Pelagos\Vehicles\Cars\Car as Car;
use \Pelagos\Exceptions\ArgumentException as ArgumentException;

class CarTest extends PHPUnit_Framework_TestCase {
  /**
   * Unit tests that exercise Pelagos\Vehicles\Car class
   */

  /**
   * Provide an array of parameters to use for testing a number of Car methods
   *
   * Constructor interface:  public function __construct((int)$numberOfDoors, (4 digit)$year)
   */
  public static function carConstruct_Provider() {
    return  array (
    /* numberOfDoors, year */
      array(1, 2012, 1, 2012),
      array(12, 2012, 12, 2012),
      array(0, 2012, "ArgumentException", 2012),
      array(13, 2012, "ArgumentException", 2012),
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
   * @dataProvider carConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int year - year of manufacture
   * @Parameter int expected_numberOfDoors - resulting number of doors found after constructor call
   * @Parameter int expected_year - expected year of manufacture after constructor call
   */
  public function test_construct($numberOfDoors, $year, $expected_numberOfDoors, $expected_year) {
    try {
      $car = new Car($numberOfDoors, $year);
      $found_numberOfDoors = $car->getNumberOfDoors();
      $found_year = $car->getYear();
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
   * @dataProvider carConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int nop - not used
   * @Parameter int expected_numberOfDoors - resulting number of doors found after call to setNumberOfDoors
   * @Parameter int nop2 - not used
   */
  public function test_setNumberOfDoors($numberOfDoors, $nop, $expected_numberOfDoors, $nop2) {
    try {
      $car = new Car(1,1900);
      $car->setNumberOfDoors($numberOfDoors);
      $found_numberOfDoors = $car->getNumberOfDoors();
    } catch (ArgumentException $e) {
      $found_numberOfDoors = "ArgumentException";
    }
    $this->assertEquals($expected_numberOfDoors, $found_numberOfDoors);
  }

  /**
   * @dataProvider carConstruct_Provider
   * @Parameter int nop - not used
   * @Parameter int year - model year
   * @Parameter int nop2 - not used
   * @Parameter int expected_year - resulting model year after call to setYear
   */
  public function test_setYear($nop, $year, $nop2, $expected_year) {
    try {
      $car = new Car(1,1900);
      $car->setYear($year);
      $found_year = $car->getYear();
    } catch (ArgumentException $e) {
      $found_year = "ArgumentException";
    }
    $this->assertEquals($expected_year, $found_year);
  }

  public function test_honk() {
    $car = new Car(4,2010);
    $honk = $car->honk();

    $this->assertEquals($honk, "");
  }
}
?>