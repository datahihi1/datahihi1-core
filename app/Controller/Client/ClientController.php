<?php

namespace App\Controller\Client;

use App\Common\Controller;

class ClientController extends Controller
{
    public function home()
    {
        return $this->render("client.home");
    }
}
