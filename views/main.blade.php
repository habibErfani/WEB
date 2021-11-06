@extends('master')
@section('title', $title)
@section('main')
    <table>
        <thead style="background-color:#ddd; font-weight: bold;">
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Téléphone</td>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->nom}}</td>
                <td>{{$contact->prenom}}</td>
                <td>{{$contact->telephone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
