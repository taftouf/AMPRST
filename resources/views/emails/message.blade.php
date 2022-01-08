@component('mail::message')
# {{ $data['titre']}}

{{ $data['message']}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/Event','color' => 'success'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
