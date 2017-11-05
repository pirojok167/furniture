<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center mt-4 mb-4">Оствьте заявку на ремонт, и мы свяжемся с вами в ближйшее время.</p>
            </div>
            <div class="col-6">
                <p class="mb-2">Контакты:</p>
                <p class="mb-1">89594986165</p>
                <p>89594986165</p>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        {{ $error }}'
                    @endforeach
                @endif
                @if(Session::has('result') && !is_array(Session::get('result')))
                    {{ Session::get("result") }}
                @endif
                <p class="mb-0">Мы также есть в viber и whatsapp:</p>
                <p class="mt-3 fl">
                    <a href="viber://chat?number=+38xxxxxxxxxx">
                        <img class="icon icons8-Viber" width="48" height="48" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFFElEQVRoQ+WZjbEVNwyFpQoCFRAqCFQAVJBQAVBBoIKECoAKEioAKgAqACoIVJCXCpT57khvvLZle99dwjDxzM7927V1pKMj2VflOx/6ndsv/28AZvajiNwRkVt+8ZlrNN75j7x+FpH3qsrrlcbuCLjRD0Tk4cDYL25cGHVNRH4aWAgAAL1U1QC4BGgZgJlhxDM3PCbH0Ndu7EcR+aiqF6OV3QFEiajxercCB5hHq0CWAJjZryLyu4gA4h8R+ZNLVTH67OHOIaJcESkicX/mkCkAM/uj8PoLgMwmPQeRmQECZ90goiJyb7TeEEBhPF6/e5THZwA9IlATgRiCSAGY2S8i8sops9t4NwI6hCrB7S97FMfMMJ45Xqjq4x7wLgBf/IMvTgh3KQMLmdlfiUph1HNVfbkYCYD/ICI3e+AzAKBFcd6oKpFohpmhHoQY6Wt03MyYg3si0aNWwG0Gz5CkQyEwM/LhtywKGQC8z4K36wVcBqEWvzOQTaLUGFKADIPfe1QwCvA8+0RVUbXu8PWI5oWqXq9vagA4ff6G+6qKbG6GmQW48nsMIcSbGmBm1rEKY5+6suHZ1AHxrJlBYQA3Du0BiOSFGkja5XCPvk2c9U5V71X3M1dEimTmM3w+Ge2fAfFZVW8OovBcRKhFFLhNtHoAgnNPVZX3JYD4LVurWcCLIJGE829IYBGhFQkQfMa7UIn3zSgUsXFqDwD6+7PzeqM+xUQZgIZKZsZ3eJ1Bnjxy+uBR5n8iItAyjYKZEUXuofFDGC5HD0DwrStbZoYnQ0l6QDay60nIotART/P8bQfDPFCHNU/vszrh+dSA7AEgga+paqZQIxqlsgvSIhnxOjlBFMr3yCoM6NHoJAi1XT0A3RtjRlepKC7lQg0/aysKEUBOcQSCgCIxSOYm74p1T8xYBdBwrTTGzEIVyq+vz5q8AjzGMAcAaBDJk/MBFEVjBgBVISHLXEj5m1AiErOkUKNidQTqPNlQqAxxne0DOsRPafgzySqMg060HrcGSRzishGJGkAqV4kXayrtisIMWEXb43KgSuiSStMNyB6jKwBddcxUqNs4DbiMd6JYsdWkWB06oq9aUaFT5czqwCIIIoGmb9psM6OLpR9ijccre4Ii2sg7G6LNsc2oEjed38ilSaNHcrKbuqj21jEVRQvlmZ1kUMmR3KVWIu38ZpzwDTmHAHvGdGNTzNtsLXsRoGfBiGllHdCJlnd0kFU/SgSIePeEzsyYjw52qZ2GY+yAhj36hE4UumibV6MxaiNOCiQiTbXPGrY4DUibqxWrPPQACYUaPdY9PCha+E+qGpujy3kyAEGjZpe1Ynil33iOKsuVAUnpamYkL0ncbTNG50LR96f9yR4w3sihSrTQ5UjPfApl6+7PmWTlYGu66d4JJPbGRIYId8+cfBeG97kvpfLsaDE2L9Pjjz0gZve68RQ9wA7VcOVwt9yBnU7V/MBrWHxmRiYSjMHsC+I0ZCrlUwAs5EqA4dH/HxIR339QL1CX8giGw2ROwbunFCX4JQBFP8IiXBQVRnZyx+9wt5G9wffMxx8mFC3OTpcivAtAASRoVZ9AYDRFsDnR61AGL0NJDCWRSejdf5gcBsBlEtXA65w89847qe5X/kOvlzeHAKiMH+6nr5Lco2fOBuA0CM9/8n9ylvh7BJhzAbDzorJCm//c+GElHnmn+NMhbvsmxh8FYFpsjqBKNse5FPqmxl85Al/To3vn/hfxo6dPA/gGVgAAAABJRU5ErkJggg==">
                    </a>
                </p>
                <p class="mt-3 fl ml-3">
                    <a href="whatsapp://send?phone=79xxxxxxxxx">
                        <i class="fa fa-3x fa-whatsapp text-white" aria-hidden="true"></i>
                    </a>
                </p>
                <div class="clearfix"></div>
                <p>Email: <small>danil54658798@gmail.com</small></p>
            </div>
            <div class="col-6">
                <form action="{{ route('sendOrder') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12 form-group">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') ?? '' }}" placeholder="Имя">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <input class="form-control" type="text" name="phone" value="{{ old('phone') ?? '' }}" placeholder="Телефон">
                        </div>
                        <div class="col-6 form-group">
                            <input class="form-control" type="email" name="email" value="{{ old('email') ?? '' }}" placeholder="E-mail">
                        </div>
                        <div class="col-12 form-group">
                            <textarea class="form-control" placeholder="Комментарий" name="comment" id="" rows="6">{{ old('comment') ?? ''                              }}</textarea>
                        </div>
                        <div class="col-12 form-group d-flex">
                            <input class="pointer btn btn-light ml-auto" type="submit" value="Отправить">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 text-center p-2">
                <small>Разработано: <span style="text-decoration: underline">CodeEx</span></small>
            </div>
        </div>
    </div>
</footer>