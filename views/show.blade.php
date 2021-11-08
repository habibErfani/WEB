@extends('master')

@section('title', $title)

@section('main')
    <h1>Affichage d'une personne</h1>
    <div>

        <h2 style="color: @if($personne->isActif())
                green @else
                red @endif;">{{$personne->getNom()}} {{$personne->getTelephone()}} @if($personne->isActif())
                (Actif) @else() (Non actif) @endif</h2>

        <menu>
            <button id="supprimer">Supprimer</button>
        </menu>
    </div>
    <dialog id="demandeValidation" close>
        <form method="dialog">
            <input type="hidden" value="{{$personne->getId()}}" id="idPersonne">
            <h3>Suppression de la personne {{$personne->getNom()}} de l'agenda ?</h3>
            <menu>
                <button value="annule">Annuler</button>
                <button value="valide">Confirmer</button>
            </menu>
        </form>
    </dialog>
@endsection

@section('scripts')
    <script>
        let id = document.getElementById('idPersonne').value;
        let supprimer = document.getElementById('supprimer');
        let $dialog = document.getElementById('demandeValidation');
        supprimer.addEventListener('click', function onOpen() {
            if (typeof $dialog.showModal === "function") {
                $dialog.showModal();
            } else {
                console.error("L'API <dialog> n'est pas prise en charge par ce navigateur.");
            }
        });

        $dialog.addEventListener('close', function () {
            console.log('Fermeture. ', this.returnValue);
        });
        $dialog.addEventListener('close', function onClose() {
            const url = 'http://localhost:8080/personnes/' + id + '/delete';
            if ($dialog.returnValue === 'valide') {
                fetch(url, {
                    method: 'POST',
                    redirect: 'follow'
                }).then(response => {
                    // HTTP 301 response
                    console.log(response);
                    if (response.redirected) {
                        window.location.href = response.url;
                    }
                }).catch(function (err) {
                    console.info(err + " url: " + url);
                });
            }
        });
    </script>
@endsection
