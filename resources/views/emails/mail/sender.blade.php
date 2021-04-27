@component('mail::message')
# Benvenuto!

E' un piacere averti nella nostra grande famiglia di Deliveboo,adesso puoi accedere alla tua dashboard personale per
gestire i tuoi ristoranti, i tuoi piatti e visualizzare le statistiche reltive agli ordini.

Per qualsiasi chiarimento o dettaglio non esiti a contattarci alla nostra mail deliveboo@gmail.com o allo
021234567.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/restaurants'])
Vai alla tua dashboard
@endcomponent

Grazie mille,<br>
Deliveboo
@endcomponent
