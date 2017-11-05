@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<a href="{{ route('home') }}">Перетяжка и изготовление мягкой мебели в Воронеже</a>
@endcomponent
