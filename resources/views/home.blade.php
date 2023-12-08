@extends('template')

@section('content')

    <section class="content">
        <h2 style="color:#9dd091; font-weight: bold">Le problème</h2>

        <p>Le changement climatique est une réalité qui n'est plus à démontrer. Les scientifiques du GIEC sont catégoriques : les activités humaines, principalement par le biais des émissions de gaz à effet de serre, ont sans équivoque provoqué le réchauffement de la planète. Faire face à l'urgence climatique est néanmoins possible : des solutions claires et efficaces existent et sont à notre portée pour limiter le changement climatique et ses conséquences.</p>

        <p>Malgré la quantité et la qualité des ressources dont nous disposons aujourd'hui sur le changement climatique et les options qui s'offrent à nous pour le contrer, beaucoup de fausses informations continuent de circuler sur le sujet, des arguments climatosceptiques aux idées reçues erronées sur les solutions :
            <ul>
                <li>"Ce n'est pas à nous d'agir";</li>
                <li>"Les énergies renouvelables ne sont pas assez efficaces";</li>
                <li>"La technologie nous sauvera";</li>
                <li>etc.</li>
            </ul>
        </p>
    </section>

    <section class="container text-left my-4" style="padding-left: 0;">
        <h2 style="color:#9dd091; font-weight: bold">Les fausses solutions</h2>
        
        <div class="container text-center">
            <div class="row">
                @foreach ($themes as $theme)
                    <div class="col">
                        @include('partial/card-theme', ['theme' => $theme])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container text-left my-4" style="padding-left: 0;">
        <h2 style="color:#9dd091; font-weight: bold">Le QUIZZ</h2>

        <p>Voici un petit QUIZZ de 14 questions afin d'en apprendre plus à propos des thèmes propopsés :</p>

        <div class="container text-center">
            <a href="/quizz" class="btn btn-success mt-3">Commencer le QUIZZ !</a>
        </div>
    </section>

@endsection
