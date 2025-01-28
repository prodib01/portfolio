@component('mail::message')
    # New Contact Message

    From: {{ $messageData['name'] }} ({{ $messageData['emails'] }})

    Subject: {{ $messageData['subject'] }}

    Message:
    {{ $messageData['message'] }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
