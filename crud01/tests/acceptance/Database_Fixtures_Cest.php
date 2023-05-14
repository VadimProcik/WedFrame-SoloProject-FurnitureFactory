<?php

namespace App\Tests\acceptance;

use Codeception\Example;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\DataSet\CsvDataSet;
use App\Tests\AcceptanceTester; // make sure this is the correct namespace

class Database_Fixtures_Cest
{
    private $conn;

    protected function getConnection()
    {
        // connect to database
        $conn = new \PDO('mysql:host=127.0.0.1;dbname=projectschema', 'root', '');
        return $this->createDefaultDBConnection($conn, 'projectschema');
    }

    public function testDatabase(AcceptanceTester $I)
    {
        $email = $I->grabFromDatabase('users', 'email', ['name' => 'john doe']);
    }

}

