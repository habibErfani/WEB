@extends('master')
@section('title', $title)
@section('main')
    <h1>Ajout d'une personne</h1>

    @if(isset($feedback))
        <h4>Attention</h4>
        <ul>
            @foreach($feedback as $info)
                <li>{{$info}}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="/personnes">
        <fieldset>
            <legend>Information d'une personne</legend>
            <div>
                <label for="nom">Nom : </label>
                <input type="text" name="nom" value="{{$personne->getNom()}}" id="nom" placeholder="Nom de la personne">
            </div>
            <div>
                <label for="telephone">Telephone : </label>
                <input type="text" name="telephone" value="{{$personne->getTelephone()}}" id="telephone" placeholder="Téléphone de la personne">
            </div>
            {{-- Les autres champs ... --}}
            <button type="submit" class="btn  btn-success">Valider</button>
        </fieldset>
    </form>
@endsection
