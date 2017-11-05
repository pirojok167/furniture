<footer>
    <h2>Оствьте заявку на ремонт, и мы свяжемся с вами в ближйшее время.</h2>
    <h3>Контакты</h3>
    <p>89594986165</p>
    <p>89594986165</p>
    <h3>Email</h3>
    <p>testsest.setsts</p>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
               {{ $error }}'
        @endforeach
    @endif

    @if(Session::has('result') && !is_array(Session::get('result')))
        {{ Session::get("result") }}
    @endif
    <form action="{{ route('sendOrder') }}" method="post">
        {{ csrf_field() }}
        <p>Ваше имя</p>
        <input type="text" name="name" value="{{ old('name') ?? '' }}" placeholder="name">
        <p>Телефон</p>
        <input type="text" name="phone" value="{{ old('phone') ?? '' }}" placeholder="phone">
        <p>Email</p>
        <input type="email" name="email" value="{{ old('email') ?? '' }}" placeholder="email">
        <p>Оставьте вопрос или комментарий</p>
        <textarea name="comment" id="" cols="30" rows="10">{{ old('comment') ?? '' }}</textarea>
        <input type="submit" value="Отправить">
    </form>
</footer>