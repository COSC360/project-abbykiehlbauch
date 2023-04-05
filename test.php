<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function setUp(): void
    {
        $_POST['submitlogin'] = true;
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'testpassword';
        $_GET['q'] = 'user';
    }

    public function testLoginSuccess()
    {
        ob_start();
        include 'authentication.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('location: profile.php', $output);
        //ob_end_clean();
    }

    public function testLoginFailure()
    {
        $_POST['password'] = 'wrongpassword';

        ob_start();
        include 'authentication.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Invalid username or password.', $output);
        //ob_end_clean();
    }
}


?>