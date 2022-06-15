<?php

namespace Aigletter\App\Controllers;

class CredentialsViewController
{
    public function viewCredentials()
    {
        echo $_ENV['DATABASE_PASSWORD'];
    }
}