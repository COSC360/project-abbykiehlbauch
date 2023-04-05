<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        // Set up the test data
        $_POST['submitlogin'] = true;
        $_POST['username'] = 'johndoe';
        $_POST['password'] = 'password';
        $_GET['q'] = 'user';

        // Include the code to be tested
        include 'authentication.php';

        // Check if the user was redirected to the correct page
        $this->assertEquals('profile.php', basename($_SERVER['REQUEST_URI']));
    }

    public function testInvalidLogin()
    {
        // Set up the test data
        $_POST['submitlogin'] = true;
        $_POST['username'] = 'johndoe';
        $_POST['password'] = 'wrongpassword';
        $_GET['q'] = 'user';

        // Include the code to be tested
        include 'authentication.php';

        // Check if an error message was displayed
        $this->expectOutputString('Invalid username or password.');
    }
}
