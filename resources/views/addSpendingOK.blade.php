@extends('template')

@section('title')
    Ajouter une dépense
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

    <h2 class="alert-success"> La dépense a bien été ajoutée</h2>
    <br/>
    <p>
        <i> Ajouter une autre dépense...</i>
    </p>

    <br />

    <!-- formulaire d'ajout-->
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <!-- titre block -->
            <div class="card-header">
                Saissisez les informations relatives à votre dépense
            </div>
            <!-- le formulaire -->
            <div class="card-body">
            {!! Form::open(['url' => 'wimw/add-spending']) !!}

            <!-- date dépense (date_depense) -->
                <div class="form-group">
                    {!! Form::date('date_depense', \Carbon\Carbon::now(),
                    [
                        'required' => 'required'
                    ]) !!}
                    {!! $errors->first('date_depense', '<small class="help-block">:message</small>') !!}
                </div>

                <!-- montant dépense (montant)-->
                <div class="form-group">
                    {!! Form::input('number', 'montant',
                     null,
                     [
                        'class' => 'form-control',
                        'placeholder' => 'Montant de la dépense en €',
                        'required' => 'required'
                     ]) !!}
                </div>

                <!-- catégorie dépense (fk_categorie) -->
                <div class="form-group">
                    <?php /** @var $natures ArrayObject
                     * @var $nat \App\Models\Nature_paiement
                     */
                    ?>
                    {{  Form::label('catégorie', 'Catégorie') }}
                    <select id="categorie" name="categorie">
                        @foreach ($categories as $key => $cat)
                            <option selected value="{!! $key !!}"> {!! $cat->getNom() !!}</option>
                        @endforeach
                    </select>
                </div>
                <!-- nature paiement (fk_nature_paiement) -->
                <div class="form-group">
                    <?php /** @var $natures ArrayObject
                     * @var $nat \App\Models\Nature_paiement
                     */
                    ?>
                    {{  Form::label('nature', 'Nature paiement') }}
                    <select id="nature_paiement" name="nature_paiement">
                        @foreach ($natures as $key => $nat)
                            <option value="{!! $key !!}"> {!! $nat->getNom() !!}</option>
                        @endforeach
                    </select>
                </div>
                <!-- intitulé dépense (nom)-->
                <div class="form-group">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Intitulé de la dépense (optionnel)']) !!}
                </div>
                <!-- description dépense (description) -->
                <div class="form-group">
                    {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la dépense (optionnel)']) !!}
                </div>


                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- fin form-->

    <br />

@endsection