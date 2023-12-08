<ul class="nav border-bottom">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/" style="color:#9dd091">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#9dd091">Apprendre</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($themes as $theme)
                <li><a class="dropdown-item" href="/apprendre/{{ $theme->id }}">{{ $theme->titre }}</a></li>
            @endforeach
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/quizz" style="color:#9dd091">Quizz</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/bande-dessinee" style="color:#9dd091">Bande dessinnée</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/contact" style="color:#9dd091">Contact</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/xmax" style="color:red">Xmax Images</a>
    </li>
</ul>
