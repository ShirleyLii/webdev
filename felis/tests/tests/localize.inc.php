<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Felis\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('liyingfe@cse.msu.edu');
    $site->setRoot('/~liyingfe/step7');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=liyingfe',
        'liyingfe',       // Database user
        'qwerasdf',     // Database password
        'test_');            // Table prefix

};