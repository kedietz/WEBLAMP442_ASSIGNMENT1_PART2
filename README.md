# WEBLAMP442 Assignment 1, Part 2

Developer: Kent Dietz

## Project Requirements

Using Assignment 1, Part 1 (see https://github.com/kedietz/WEBLAMP442_ASSIGNMENT1_PART1) as the starting point, re-implement the design to take advantage of a number of PHP features.

- Set up basic project skeleton
- Set up namespace for every class
- Set up autoloading (using composer - http://getcomposer.org)
- Develop a test suite for all classes
- Generate test coverage, aiming for 100% coverage

## Project files structure

I chose to implement a namespace based on my company name (Pelagos Systems):

```
 - Src
   - Pelagos
     - Exceptions
        - Exception.php
     - Vehicles
        - vehicle.php
        - vehicleinterface.php
        - car.php
        - truck.php
        - civic.php
 -Tests
   - Conf
	- phpunit.xml
   - Src
     - Bootstrap.php (takes care of handling autoloading, setting error levels, other test configuration work)
     - Pelagos
	- Vehicles
          - CarTest.php
          - TruckTest.php
          - CivicTest.php
          NOTE: No specific tests for Exception.php, vehicle.php or vehicleinterface.php since the tests for car/truck/civic covered the code
 - Bootstrap.php   (takes care of autoloading)
 - composer.json   (Sets up autoloading, dependencies (phpunit))
 - README.md       (This file, project informationWhat this project is, how to run composer to install dependencies, how to run unit tests
```

## Project Details

### Enlisting

Follow these steps to build put the project in a working state:

1. Subscribe to the github repository: https://github.com/kedietz/WEBLAMP442_ASSIGNMENT1_PART2
2. Run composer from the repository root to setup autoloading and get phpunit
   * composer update -v -o (slower, but downloads required to download correct phpunit)
   * composer install -v -o (faster, but download)
3. Run tests:
   * Make sure <repository root>/Vendors/bin is on your path
   * run: phpunit Tests
      Output should be similar to:
`
        PHPUnit 3.7.13-1-gc80d9a4 by Sebastian Bergmann.

        ...............................................................  63 / 174 ( 36%)
        ............................................................... 126 / 174 ( 72%)
        ................................................
          
        Time: 0 seconds, Memory: 4.00Mb

        OK (174 tests, 183 assertions)
`
4. Run code coverage
   * phpunit --coverage-html ./report tests
   * view report/index.html (NOTE: this will also show "Vendors" directory coverage ... please ignore, did not figure out how to remove it from project).\

