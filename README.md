# PHP-FSMySQL
This repository contains the source code of FSMySQL for PHP7+ programming language. The main objective of this mysql connection system with small footprint is to be the fastest and most secure. Repository is currently live and maintained.
# Guide
*USAGE:*
* First Step -> Define the "MySQL" variable and set it to true. Example: ```define('MySQL', TRUE);```
* Second Step -> Require the connection.php file. Example: ```require_once('connection.php');```
* Third Step -> Create an instance or object of the DBConnect class. Example: ```$DBX = new DBConnect();```
* Fourth Step -> Query with built in function. Example: ```$DBX->dbquery('SQL Query', array('s', mixed $VALUE));```
* Fifth Step -> Destroy or unset the instance or object of the class. Example: ```unset($DBX);```

*NOTE:*
* The function mysqli_report() have five modes. [PHP Function MySQLi Report Manual](http://php.net/manual/pl/function.mysqli-report.php)
* The query command array can take multiple mixed values with the increasing number of "s" as "sss" form.
* The try catch exception handler can provide full exception detail by providing the "$e" variable on the exit() function.

# Features
1. Fastest connections due to php raw code implementation.
2. Most secure sql query courtesy of parameter and string escaping method.
3. Small footprint of just one file of 1.5KB.
4. PHP class for easy implementation to other methods.
5. Defined but synchronous garbage collection.
# Bugs
1. [CRITICAL] Read sql statements not working due to the usage of result get array tag. [[Issue #4]](https://github.com/FSMySQL/PHP-FSMySQL/issues/4)
# Contribute
FSMySQL is licensed under the GNU General Public v3 License. Anybody is welcome to create issues and pull requests for different bugs and features. We highly acknowledge open source power.
