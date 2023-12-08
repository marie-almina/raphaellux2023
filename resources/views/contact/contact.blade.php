@extends('template')

@section('content')

    <p>Veuillez remplir ce formulaire afin de nous contacter :</p>

    <form method="post" action="contact/envoiMail">
        <div class="row mb-5">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom" aria-label="Nom" name="nom">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom" aria-label="Prénom" name="prenom">
            </div>
        </div>
        <div class="row mb-5">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="row mb-5">
            <label for="message" class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
        </div>    
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
        @csrf
    </form>

    @if (session('ok'))
        @include('partial/modal')
    @endif

@endsection