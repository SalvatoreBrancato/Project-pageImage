@extends('layouts.app')
@section('content')

<section id="section-welcome" class="text-center">
    {{--Prima sezione--}}
<div class="square first">
    <h2 class="title mt-2">Tutto in  un unica piattaforma</h2>
    <div>
        <i class="fa-solid fa-list-check" style="color: #ffffff;"></i>
        <span class="text-white">Area personale</span>
        <div class="text-white">Gestisci tutto da un unica piattaforma, anche da mobile</div>
    </div>
    <div>
        <i class="fa-solid fa-star" style="color: #ffffff;"></i>
        <span class="text-white">Recensioni</span>
        <div class="text-white">Tutte le recensioni dei tuoi clienti in tempo reale </div>
    </div>
    <div>
        <i class="fa-solid fa-inbox" style="color: #ffffff;"></i>
        <span class="text-white">Notifiche</span>
        <div class="text-white">Ricevi una messagio ad ogni nuova richiesta e visualizza tutte le informazioni del cliente.</div>
    </div>
</div>
    {{--Seconda sezione--}}
<div class="square second">
    <h2 class="title mt-2">Come funziona</h2>
    <div>
        <div>
            <i class="fa-solid fa-user-pen" style="color: #ffffff;"></i>
            <span class="text-white">Crea il tuo profilo</span>
            <div class="text-white">Iscriviti gratuitamente, configura il tuo profilo e pubblica le tue migliori foto.</div>
        </div>
        <i class="fa-solid fa-arrow-down-long pt-2" style="color: #ffffff;"></i>
        <div>
            <i class="fa-solid fa-envelope-open-text" style="color: #ffffff;"></i>
            <span class="text-white">Fai un buon lavoro</span>
            <div class="text-white">Ricevi una notifica tutte le volte che le tue foto suscitano interesse.</div>
        </div>
       

    </div>
</div>
{{-- Terza sezione --}}
<div class="square third">
    <h2 class="title mt-3">
        Metti in cima alle ricerche le tue foto
    </h2>
    <div class="d-flex flex-column justify-content-around h-75">
        <p class="text-white mt-2">
            Le tue foto saranno tra i primi risultati che gli utenti vedranno quando effettueranno una ricerca e saranno in evidenza nella home page.            
        </p>   
        <h5 class="text-white">
            Non perdere tempo, registrati e entra a far parte del nostro network!
        </h5>
    </div>
    
</div>
{{-- Quarta sezione --}}
<div class="square fourth">
    <h2 class="title mt-2">Assistenza personalizzata</h2>
    <div class="d-flex align-items-center justify-content-center h-75">
        <p class="text-white">
            Ci prendiamo cura dei nostri iscritti e siamo consapevoli che ogni esigenza è unica. Il nostro team di assistenza dedicato è disponibile per risolvere qualsiasi dubbio, problema o richiesta che possa sorgere durante la vostra esperienza sulla nostra piattaforma. Non esitate a contattarci tramite il nostro servizio di assistenza online o via email. Saremo lieti di fornirvi il supporto necessario in tempi rapidi ed efficienti.
        </p>
    </div>
</div>


</section>
@endsection