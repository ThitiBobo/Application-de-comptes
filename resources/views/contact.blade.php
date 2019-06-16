@extends('template')

@section('title')
    Contact
@endsection

@section('proverbe')

    <?php /** @var \App\Models\Proverb $prov */ ?>
    {{ $prov->getProverbe() }}
@endsection

@section('source')
    {{ $prov->getSource() }}
@endsection

@section('dateProverbe')
    ({{ $prov->getAnneeProverbe() }})
@endsection

@section('content')

    <br/>

    <h2> Nous contacter</h2>

    <br />
    <h3> Notre formulaire de contact est en construction...</h3>
    <p>
        <i>Revenez plus tard !</i>
    </p>

    <p>
    <i>
        D'ici là, n'hésitez pas à nous contacter par e-mail :
        <ul>
            <li>
                dorian.naaji@etu.univ-lyon1.fr
            </li>
            <li>
                thibaut.delplanque@etu.univ-lyon1.fr
            </li>
        </ul>
    </i>
    </p>

    <br />

@endsection