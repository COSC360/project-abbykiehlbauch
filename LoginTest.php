<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        // Set up the test data
        $submit = true;
        $user = 'johndoe';
        $pass = '12345';
        $u = 'user';

	    $_POST['submitlogin'] = $submit;
        $_POST['username'] = $user;
        $_POST['password'] = $pass;
        $_GET['q'] = $u;

        // Include the code to be tested
        include 'authenticationTest.php';
        // Check if the user was redirected to the correct page
        $this->assertEquals('profile.php', basename($_SERVER['REQUEST_URL']));
    }

    public function testInvalidLogin()
    {
        // Set up the test data
        $submit = true;
	$user = 'johndoe';
	$pass = '12345';
	$u = 'user';

	$_POST['submitlogin'] = $submit;
        $_POST['username'] = $user;
        $_POST['password'] = $pass;
        $_GET['q'] = $u;

        // Include the code to be tested
        include 'authenticationTest.php';

        // Check if an error message was displayed
        $this->expectOutputString('Invalid username or password.');
    }
}
