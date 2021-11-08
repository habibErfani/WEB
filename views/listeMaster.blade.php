@extends('master')
@section('title', $title)
@section('main')
    <h2>{{$title}}</h2>
    <table>
        <thead style="background-color:#ddd; font-weight: bold;">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personnes as $p)
            <tr>
                <td><a href="/personnes/{{$p->getId()}}">{{$p->getId()}}</a></td>
                <td>{{$p->getNom()}}</td>
                <td>{{$p->getTelephone()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
