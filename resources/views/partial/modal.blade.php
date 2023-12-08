<div id="myModal" class="modal" tabindex="-1" data-bs-show="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Halte là, {{ session('nom') }} {{ session('prenom') }} !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>On ne va quand même pas envoyer un email juste pour ça, petit joueur !<br>
                   Ce n'est pas bon pour l'environnement... &#128516;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
  
<!-- JAVASCRIPT -->

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const myModal = new bootstrap.Modal(document.getElementById('myModal')).show();
    });
</script>