@extends('template')

@section('title')
    Ajouter une catégorie
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
    <nav class="navbar navbar-light">
        <form class="form-inline">
            <a href="{{ url('/wimw/overview') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Vue d'ensemble</button></a>
            <span> &nbsp; &nbsp;  </span>
            <a href="{{ url('/wimw/list') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Liste des dépenses</button></a>
            <span> &nbsp; &nbsp;  </span>
            <a href="{{ url('/wimw/budget') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Budget</button></a>
            <span> &nbsp; &nbsp;  </span>
            <div class="dropdown show">
                <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ajouter...
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/wimw/add-spending') }}">une dépense</a>
                    <a class="dropdown-item" href="{{ url('/wimw/add-category') }}">une catégorie</a>
                </div>
            </div>
        </form>
    </nav>
    <br/>


    <br/>

    <h2>Ajouter une catégorie</h2>

    <!-- formulaire d'ajout-->
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <!-- titre block -->
            <div class="card-header">
                Saissisez les informations relatives à votre catégorie
            </div>
            <!-- le formulaire -->
            <div class="card-body">
            {!! Form::open(['url' => 'wimw/add-category']) !!}

            <!-- nom cat (nom) -->
                <div class="form-group">
                    {!! Form::text('nom', null,
                    [
                    'class' => 'form-control',
                    'placeholder' => 'Nom de la catégorie',
                    'required' => 'required'
                    ]) !!}
                </div>

                <!-- plafond (plafond)-->
                <div class="form-group">
                    {!! Form::input('number', 'plafond',
                     null,
                     [
                        'class' => 'form-control',
                        'placeholder' => 'Plafond que vous vous accordez pour cette catégorie',
                        'required' => 'required'
                     ]) !!}
                </div>

                <!-- description (description))-->
                <div class="form-group">
                    {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la catégorie (optionnel)']) !!}
                </div>


                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <br />

@endsection