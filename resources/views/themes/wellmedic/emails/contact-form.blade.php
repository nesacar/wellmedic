@component('mail::message')
    # Poruka sa sajta wellmedic.rs

    Ime: {{ $message->name }}
    Email: {{ $message->email }}
    Poruka: {{ $message->message }}

    Hvala,
    wellmedic.rs
@endcomponent
