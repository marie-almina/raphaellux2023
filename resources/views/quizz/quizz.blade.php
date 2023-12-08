@extends("template")
@section('content')
<div class="d-flex flex-column align-items-center justify-content-center">
    @if(count($questions) == $i)
        <div>Votre score : {{$score}}/{{count($questions)}}</div>
    @else

    <div class="card text-center">
        <div class="card-header">
            Question {{$i+1}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$questions[$i]->libelle}}</h5>
        </div>
        <div class="card-footer text-muted">
            @foreach ($questions[$i]->reponses as $reponse)
            <button  type="button" class="btn btn-outline-primary" data-id="{{$reponse->id}}" onclick="showAnswers({{$reponse->id}})">{{$reponse->reponse}}</button>
        @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
            Thème concerné : "{{ $questions[$i]->theme->titre }}"
        </div>
        <div class="row justify-content-end">
            <div class="">
                <form method="POST" action="/showQuestion">
                    <button type="submit" class="d-flex mt-4 btn btn-success">Question suivante</button>
                    @csrf
                    <input type="hidden" name="questionIndex" value="{{$i+1}}"/>
                    <input type="hidden" name="score" value="{{$score}}"/>
                    <input type="hidden" name="answerId" value="">
                </form>
            </div>
        </div>


    </div>

    <script src="{{asset('js/ajax.js')}}"></script>
    <script>
        var alreadySent = false;

        function changeButton(button, answerId){
            var buttonHtml = document.querySelector("button[data-id='"+button.id+"']");

            if(button.estVrai == 0 && answerId == button.id){
            buttonHtml.classList.remove("btn-outline-primary");
            buttonHtml.classList.add("btn-danger");
        }else if(button.estVrai == 1){
            buttonHtml.classList.remove("btn-outline-primary");
            buttonHtml.classList.add("btn-success");
        }else{
            buttonHtml.classList.remove("btn-outline-primary");
            buttonHtml.classList.add("btn-outline-secondary");
        }
    }
    function showAnswers(answerId){
        if(alreadySent){return;}
        alreadySent = true;
        
        document.querySelector("input[name='answerId']").value = answerId;
        var csrf = document.querySelector("input[name='_token']").value;
        ajax.post("{{route('getAnswers')}}", {id:{{$questions[$i]->id}}, _token:csrf}, function(res){
            console.log(res);
            res.forEach(answer => {
                changeButton(answer, answerId);
            });
        });
    }
    </script>
    @endif
@endsection
