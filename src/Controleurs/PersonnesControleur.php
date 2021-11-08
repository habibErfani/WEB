<?php
namespace TpWeb\Controleurs;

use duncan3dc\Laravel\BladeInstance;
use Laminas\Diactoros\Response\HtmlResponse;
use TpWeb\Modeles\BDMapper;

class PersonnesControleur
{
    private BladeInstance $blade;
    private BDMapper $bd;
    /**
     * @return HtmlResponse
     */
    public function __construct(){
        $this->blade = new BladeInstance(__DIR__ . "/../../views", __DIR__ . "/../../cache");
        $this->bd = new BDMapper();
    }
    function index() {
        $title = "Liste de personnes";
        $personnes = $this->bd->all();
        return $this->blade->render("listeMaster",['title' => $title,'personnes'=>$personnes]);
    }

    function show(int $id) {
        $personne = $this->bd->findById($id);
        if (!$personne) {
            return new HtmlResponse("<h1>Personne non trouvée</h1>");
        }
        return $this->blade->render("show", ['title' => 'Une personne', 'personne' => $personne]);
    }

}