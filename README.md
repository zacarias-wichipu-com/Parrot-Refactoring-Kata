# Parrot Refactoring Kata

Can you spot any code smells in this code? I'll give you a clue - a spot of Pol(l)ymorphism should improve matters!

Refactor this code, take small steps, run the tests often. See how small and beautiful and polymorphic you can make it.

Emily Bache made a video about this
kata: [From Hello Polly! to Polymorphism: Parrot Refactoring Code Kata is FUN](https://youtu.be/UxNEHKg_2eA).

This is the PHP version of the Kata. The Kata is fully functional, with a full test suite. The tests do not normally
need to be changed.

Acknowlegements
---------------

This code is heavily inspired by one of the examples in Martin Fowler's book "Refactoring". It's a classic, and if it's
not on your bookshelf already I suggest you treat yourself to a copy!

## Installation

The kata uses:

- [PHP 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

See [GitHub cloning a repository](https://help.github.com/en/articles/cloning-a-repository) for details on how to
create a local copy of this project on your computer.

```sh
git clone https://github.com/emilybache/Parrot-Refactoring-Kata.git
```

Install all the dependencies using composer

```sh
cd Parrot-Refactoring-Kata/PHP
composer install
```

Run all the tests

```shell script
composer tests
```

## Dependencies

The kata uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)

## Folders

- `src` - contains the Parrot class which need to be refactored and a ParrotType.
- `tests` - contains the corresponding tests. All the tests are passing, and shouldn't need to be changed.

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the root
of the PHP kata run:

```shell script
composer tests
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
PHPUnit `composer test` can be run:

```shell script
pu.bat
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your
browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
same `composer check-cs` can be run:

```shell script
cc.bat
```

### Fix Code

There are many code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
`composer fix-cs` can be run:

```shell script
fc.bat
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the
same `composer phpstan` can be run:

```shell script
ps.bat
```

**Happy coding**!
