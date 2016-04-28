<?php
require __DIR__ . "/../../vendor/autoload.php";

class SiteTest extends \PHPUnit_Framework_TestCase
{
    public function test_getEmail() {
        $site = new Felis\Site();
        $site->setEmail("OMFG");
        $this->assertEquals("OMFG", $site->getEmail());

        $site = new Felis\Site();
        $site->setEmail("lalla");
        $this->assertNotEquals("OMFG", $site->getEmail());
    }

    public function test_getRoot() {
        $site = new Felis\Site();
        $site->setRoot("111");
        $this->assertEquals("111", $site->getRoot());

        $site = new Felis\Site();
        $site->setRoot("121");
        $this->assertNotEquals("111", $site->getRoot());
    }

    public function test_localize() {
        $site = new Felis\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test_', $site->getTablePrefix());
    }


}
?>