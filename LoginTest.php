<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    

    public function testInvalidLogin()
    {
        //Set up the test data
        $username = 'johndoe';
        $password = '123';
        $u = 'user';

        // Include the code to be tested
        include 'authenticationTest.php';

        // Check if an error message was displayed
	$msg ='Invalid username or password.';
        $this->expectOutputString($msg);
    }
	public function testSuccessfulLogin()
    	{
        // Set up the test data
        $username = 'bobbybones';
        $password = '12345';
        $u = 'user';

	// Include the code to be tested
        include 'authenticationTest.php';

        // Check if the user was redirected to the correct page
	$link='profile.php';
        $this->expectOutputString($link);
    }
}
