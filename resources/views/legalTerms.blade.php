@extends('template')

@section('title')
    Mentions légales
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

    <h2> Conditions d'utilisation</h2>
    <h3>Utilisation de nos Services</h3>
    <p>
        Vous devez respecter les règles applicables aux Services que vous utilisez.
    </p>
    <p>
        N’utilisez pas nos Services de façon impropre. Ne tentez pas, par exemple, de produire des interférences avec nos Services ou d’y accéder en utilisant une méthode autre que l’interface et les instructions que nous mettons à votre disposition. Vous ne devez utiliser nos Services que dans le respect des lois en vigueur, y compris les lois et réglementations applicables concernant le contrôle des exportations et ré-exportations. Nous pouvons suspendre ou cesser la fourniture de nos Services si vous ne respectez pas les conditions ou règlements applicables, ou si nous examinons une suspicion d’utilisation impropre.
    </p>
    <p>
        L’utilisation de nos Services ne vous confère aucun droit de propriété intellectuelle sur nos Services ni sur les contenus auxquels vous accédez. Vous ne devez utiliser aucun contenu obtenu par l’intermédiaire de nos Services sans l’autorisation du propriétaire dudit contenu, à moins d’y être autorisé par la loi. Ces Conditions d’Utilisation ne vous confèrent pas le droit d’utiliser une quelconque marque ou un quelconque logo présent dans nos Services. Vous n’êtes pas autorisé à supprimer, masquer ou modifier les notices juridiques affichées dans ou avec nos Services.
    </p>
    <p>
        Nos Services affichent des contenus n’appartenant pas à Google. Ces contenus relèvent de l’entière responsabilité de l’entité qui les a rendus disponibles. Nous pouvons être amenés à vérifier les contenus pour s’assurer de leur conformité à la loi ou à nos conditions d’utilisation. Nous nous réservons le droit de supprimer ou de refuser d’afficher tout contenu que nous estimons raisonnablement être en violation de la loi ou de notre règlement. Le fait que nous nous réservions ce droit ne signifie pas nécessairement que nous vérifions les contenus. Dès lors, veuillez ne pas présumer que nous vérifions les contenus.
    </p>
    <p>
        Dans le cadre de votre utilisation des Services et de l’exécution de notre engagement contractuel, nous sommes susceptibles de vous adresser des messages liés au fonctionnement ou à l’administration des Services ainsi que d’autres informations. Vous pouvez choisir de ne plus recevoir certains de ces messages.
    </p>
    <p>
        Certains de nos Services sont disponibles sur les appareils mobiles. Ne les utilisez pas d’une manière susceptible de vous distraire et de vous empêcher de respecter le code de la route et les règles de sécurité en matière de conduite.
    </p>
    <p>
        <i>inspiré de la page <a href="https://policies.google.com/terms?hl=fr">https://policies.google.com/terms?hl=fr</a></i>
    </p>



    <br />

@endsection