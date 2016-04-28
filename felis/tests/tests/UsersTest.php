<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template/database version
 * @cond
 * @brief Unit tests for the class
 */

class UsersTest extends \PHPUnit_Extensions_Database_TestCase
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

    public function test_login() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on user ID
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertInstanceOf('Felis\User', $user);

        // Test a valid login based on email address
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertInstanceOf('Felis\User', $user);

        // Test a failed login
        $user = $users->login("dudess@dude.com", "wrongpw");
        $this->assertNull($user);

        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $joined = $user->getJoined();
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertEquals($user->getJoined(), $joined);

        $user = $users->login("dudess@dude.com", "87654321");
        $joined = $user->getJoined();
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertEquals($user->getJoined(), $joined);

    }

    public function test_get(){
        $users = new Felis\Users(self::$site);
        $user = $users->get("2");
        $this->assertNotInstanceOf('Felis\User', $user);

        $user = $users->get("7");
        $this->assertInstanceOf('Felis\User', $user);
    }

}


/// @endcond
?>
