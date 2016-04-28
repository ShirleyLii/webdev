<?php
/**
 * Created by PhpStorm.
 * User: goksuadanali
 * Date: 3/16/16
 * Time: 8:30 AM
 */

namespace Felis;


class LoginController
{

    public function __construct(Site $site, array &$session, array $post) {
        // Create a Users object to access the table
        $users = new Users($site);

        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);
        $user = $users->login($email, $password);
        $session[User::SESSION_NAME] = $user;

        $root = $site->getRoot();
        if($user === null) {
            // Login failed
            $this->redirect = "$root/login.php?e";
        } else {
            if($user->isStaff()) {
                $this->redirect = "$root/staff.php";
            } else {
                $this->redirect = "$root/client.php";
            }
        }
    }

    public function getRedirect()
    {
        return $this->redirect;
    }

    private $redirect;

}