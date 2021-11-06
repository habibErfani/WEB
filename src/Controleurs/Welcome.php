<?php
namespace TpWeb\Controleurs;
use Laminas\Diactoros\Response\HtmlResponse;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;


class Welcome {
    private BladeInstance $blade;
    /**
     * @return HtmlResponse
     */
    public function __construct(){
        $this->blade = new BladeInstance(__DIR__ . "/../../views", __DIR__ . "/../../cache");
    }

    function index() {
        $title = "Liste de contacts";
        return $this->blade->render("index",['title' => $title]);
    }

    // todo : afficher liste de personnes

    function about(): HtmlResponse {
        return  new HtmlResponse("<h1>Bonjour Monde !(à partir du contrôleur)</h1>");
    }




}