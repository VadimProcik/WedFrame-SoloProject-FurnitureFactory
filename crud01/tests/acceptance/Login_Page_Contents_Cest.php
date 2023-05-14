<?php

namespace App\Tests\acceptance;

use App\Tests\AcceptanceTester;

class Login_Page_Contents_Cest
{
    private function login(AcceptanceTester $I, $username, $password)
    {
        $I->amOnPage('/login');
        $I->expect('redirect to login page');
        $I->seeCurrentUrlEquals('/login');
        $I->fillField('#inputUsername', $username);
        $I->fillField('#inputPassword', $password);
        $I->click('Login');
        //success
        $I->dontSee('username could not be found');
    }

    public function testLoginForm(AcceptanceTester $I)
    {
        // test code goes here
        $this->login($I, 'myusername', 'mypassword');
    }
}