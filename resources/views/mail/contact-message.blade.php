<x-mail::message>
# New message from your portfolio

**Name:** {{ $senderName }}
**Email:** {{ $senderEmail }}

<x-mail::panel>
{{ $messageText }}
</x-mail::panel>

Reply to this email to answer {{ $senderName }} directly.
</x-mail::message>
