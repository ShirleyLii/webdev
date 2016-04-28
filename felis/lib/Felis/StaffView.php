<?php

/**
 * Created by PhpStorm.
 * User: shirley
 * Date: 3/15/16
 * Time: 7:41 PM
 */

namespace Felis;
require __DIR__ . "/../../vendor/autoload.php";

class StaffView extends View
{
    public function __construct()
    {
        $this->setTitle("Felis Investigations");
        $this->addLink(" ", "Log out");
    }
}