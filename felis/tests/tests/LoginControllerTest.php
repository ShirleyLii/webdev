<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * @brief Empty unit testing template/database version
 * @cond
 * @brief Unit tests for the class
 */

class LoginControllerTest extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */

    private static $site;

    public function test_construct() {
        $users = new Felis\Users(self::$site);
        $this->assertInstanceOf('Felis\Users', $users);
    }

    public static function setUpBeforeClass() {
        self::$site = new Felis\Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }


    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'liyingfe');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/user.xml');
    }





}



/// @endcond
?>
