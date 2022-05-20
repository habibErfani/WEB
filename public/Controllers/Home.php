<?php

namespace App\Controllers;

use Laminas\Diactoros\Response\HtmlResponse;

class Home
{  
    public function home(): HtmlResponse
    { 
        return new HtmlResponse('
<h1><div style=\"text-align: center;\">Bienvenue dans mon API</div></h1>
        <nav>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/items">Items</a>
                </li>
            </ul>
        </nav>');
    }
}
