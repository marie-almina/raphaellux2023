<a class="navbar-brand" href="/home">
    <img src="{{asset('img/logo.webp')}}" alt="Bootstrap" width="60" height="50"><span style="color:#9dd091; font-weight: bold">ÉcologuX</span>
</a>
<div class="d-flex flex-row d-flex align-items-center justify-content-end" style="align-items: flex-end;">
    <ul class="d-flex flex-row d-flex align-items-center justify-content-center" style="list-style: none; column-gap:1rem;margin-top: 1rem;margin-right: 1rem;">
        <li class="nav-item">

        </li>
        <li class="nav-item d-flex align-items-center justify-content-center">
            <a class="nav-link active" aria-current="page" href="#" style="width: max-content;">{{ Illuminate\Support\Facades\Auth::user()->name }} <span class="rounded-circle" style=" background: #cbd5e0; padding:0.75rem;"><i class="fas fa-user" style="font-size: 1.5rem;"></i></span></a>
        </li>

    </ul>
    <form class="d-flex" method="post" action="/logout">
        <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-sign-out" aria-hidden="true"></i></button>
        @csrf
    </form>
</div>
