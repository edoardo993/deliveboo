@component('mail::message')
# Ciao!

Il tuo ordine è stato correttamente registrato nei nostri Database ed è in preparazione! <br>
Buon appetito!
@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Torna al sito
@endcomponent

Grazie di aver ordinato da noi, alla prossima<br>
Deliveboo
@endcomponent
