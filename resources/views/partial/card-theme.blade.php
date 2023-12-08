<div class="card m-3" style="width: 20rem;">
    <img src="{{asset('img/themes/' . $theme->id . '.png')}}" class="card-img-top" alt="{{ $theme->titre }}">
    <div class="card-body">
        <h5 class="card-title" style="font-weight: bold">{{ $theme->titre }}</h5>
        <p class="card-text">{{ App\Helpers\TemplateHelper::cutWords($theme->description) }}</p>
        <a href="/apprendre/{{ $theme->id }}" class="btn btn-primary" style="background-color: #542302; border: black">En savoir plus</a>
    </div>
</div>