<?php
use \Pelagos\Vehicles\Cars\Corvette as Corvette;
use \Pelagos\Exceptions\ArgumentException as ArgumentException;

class CorvetteTest extends PHPUnit_Framework_TestCase {
  /**
   * Unit tests that exercise Pelagos\Vehicles\Corvette class
   */

  /**
   * Provide an array of parameters to use for testing a number of Corvette methods
   *
   * Constructor interface:  public function __construct($numberOfDoors, $year)
   */
  public static function CorvetteConstruct_Provider() {
    return  array (
    /* numberOfDoors, year */
      array(2, 2012, 2, 2012),
      array(3, 2012, "ArgumentException", 2012),
      array(4, 2012, "ArgumentException", 2012),
      array(5, 2012, "ArgumentException", 2012),
      array(6, 2012, "ArgumentException", 2012),
      array(0, 2012, "ArgumentException", 2012),
      array(1, 2012, "ArgumentException", 2012),
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
      array(2, 1953, 2, 1953),
      array(2, 1952, 2, "ArgumentException"),
      array(2, null, 2, "ArgumentException"),
      array(2, "2011", 2, "ArgumentException"),
      array(2, 0, 2, "ArgumentException"),
      array(2, "abc", 2, "ArgumentException"),
      array(2, 2000.5, 2, "ArgumentException")
    );
  }

  /**
   * @dataProvider CorvetteConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int year - model year of vehicle
   * @Parameter int expected_numberOfDoors - resulting number of doors found after constructor call
   * @Parameter int expected_year - expected model year after constructor call
   */
  public function test_construct($numberOfDoors, $year, $expected_numberOfDoors, $expected_year) {
    try {
      $Corvette = new Corvette($numberOfDoors, $year);
      $found_numberOfDoors = $Corvette->getNumberOfDoors();
      $found_year = $Corvette->getYear();
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
   * @dataProvider CorvetteConstruct_Provider
   * @Parameter int numberOfDoors - number of doors on vehicle
   * @Parameter int nop - not used
   * @Parameter int expected_numberOfDoors - resulting number of doors found after call to setNumberOfDoors
   * @Parameter int nop2 - not used
   */
  public function test_setNumberOfDoors($numberOfDoors, $nop, $expected_numberOfDoors, $nop2) {
    try {
      $Corvette = new Corvette(2,2000);
      $Corvette->setNumberOfDoors($numberOfDoors);
      $found_numberOfDoors = $Corvette->getNumberOfDoors();
    } catch (ArgumentException $e) {
      $found_numberOfDoors = "ArgumentException";
    }
    $this->assertEquals($expected_numberOfDoors, $found_numberOfDoors);
  }

  /**
   * @dataProvider CorvetteConstruct_Provider
   * @Parameter int nop - not used
   * @Parameter int year - model year
   * @Parameter int nop2 - not used
   * @Parameter int expected_year - resulting model year after call to setYear
   */
  public function test_setYear($nop, $year, $nop2, $expected_year) {
    try {
      $Corvette = new Corvette(2,2000);
      $Corvette->setYear($year);
      $found_year = $Corvette->getYear();
    } catch (ArgumentException $e) {
      $found_year = "ArgumentException";
    }
    $this->assertEquals($expected_year, $found_year);
  }

  public function test_honk() {
    $Corvette = new Corvette(2,2010);
    $honk = $Corvette->honk();

    $this->assertEquals($honk, "BEEEEP");
  }
}
