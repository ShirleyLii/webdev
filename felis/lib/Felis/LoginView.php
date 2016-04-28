<?php

namespace  Felis;

class LoginView extends View
{

    private $correctpwd = true;

    public function __construct(array $session, array $get)
    {
        $this->setTitle("Felis Investigations");
        if (isset($_GET['e'])) {
            $this->correctpwd = false;
        }

    }

    public function login()
    {
        if ($this->correctpwd) {
            $html = <<<HTML
        <form method="post" action="post/login.php">
	<fieldset>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email">
		</p>
		<p>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" placeholder="Password">
		</p>
		<p>
			<input type="submit" value="Log in"> <a href="">Lost Password</a>
		</p>
		<p><a href="./">Felis Agency Home</a></p>
	</fieldset>
</form>
HTML;
            return $html;
        } else {
            $html = <<<HTML
        <form method="post" action="post/login.php">
	<fieldset>
	<p> Login Fail! Wrong User Name or password! </p>
			<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email">
		</p>
		<p>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" placeholder="Password">
		</p>
		<p>
			<input type="submit" value="Log in"> <a href="">Lost Password</a>
		</p>
		<p><a href="./">Felis Agency Home</a></p>
		</fieldset>
</form>
HTML;
            return $html;

        }
    }

}