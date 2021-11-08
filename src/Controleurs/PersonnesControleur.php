<?php
namespace TpWeb\Controleurs;

use duncan3dc\Laravel\BladeInstance;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use TpWeb\Modeles\BDMapper;
use TpWeb\Modeles\Personne;

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

    function create() {
        echo "Create personne<br>";
        $personne = new Personne();
        return $this->blade->render("create", ['title' => 'Une personne', "personne" => $personne]);
    }

    function store(ServerRequest $request) {
        $personne = new Personne();
        $errors = $this->validePersonne($request, $personne);
        if (!empty($errors)) {
            return $this->blade->render("create", ['title' => 'Une personne', "personne" => $personne, "feedback" => $errors]);
        }
        $this->bd->insert($personne);

        return new RedirectResponse('/personnes');
    }
    /** Vérifie les données saisies dans le formulaire */
    function validePersonne(ServerRequest $request, Personne &$personne): array {
        $errors = [];
        $attributs = $request->getParsedBody();
        $nom = $attributs['nom'];
        $telephone =  $attributs['telephone'];
        $actif =  $attributs['actif'];

        if (empty($nom)) {
            $errors[] = "nom vide";
        } else {
            $personne->setNom($nom);
        }
        if (empty($telephone)) {
            $errors[] = "Téléphone vide";
        } else {
            $personne->setTelephone($telephone);
        }
        if ($actif == '1') {
            $personne->setActif(true);
        } else {
            $personne->setActif(false);
        }
        return $errors;
    }
}