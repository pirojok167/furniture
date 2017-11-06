@component('mail::message')
# <a href="{{ route('home') }}">Перетяжка и изготовление мягкой мебели в Воронеже</a>

Вы оставили заявку на нашем сайте. Мы свяжемся с вами в ближайшее время.

Наши контакты:
@component('mail::promotion')
{{ $contacts->phone_1 ?? '' }}
<br>
{{ $contacts->phone_2 ?? '' }}
<br><br>
Email
{{ $contacts->email ?? '' }}
@endcomponent

Если у вас остались сомнения - посмотрите наши работы:
@component('mail::button', ['url' => route('repair'), 'color' => 'green'])
Наши работы
@endcomponent
@endcomponent
