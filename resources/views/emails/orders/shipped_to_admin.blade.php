@component('mail::message')
# У Вас новая заявка
<br>
Данные пользователя:
@component('mail::panel')
Имя: {{ $user_data['name'] }}
<br><br>
Телефон: {{ $user_data['phone'] }}
<br><br>
Email: {{ $user_data['email'] }}
<br><br>
Комментарий:
<br>
{{ $user_data['comment'] ?? '' }}
<br>
@endcomponent

@component('mail::button', ['url' => route('admin.orders'), 'color' => 'green'])
Перейти к заявкам
@endcomponent

<a href="{{ route('home') }}">Перетяжка и изготовление мягкой мебели в Воронеже</a>
@endcomponent
