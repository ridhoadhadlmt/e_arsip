@component('mail::message')
Welcome to asdasdsadasdasd
Name: {{ $user['name'] }}<br/>
Email: {{ $user['email'] }}

Thanks,<br/>
{{ config('app.name') }}
@endcomponent
