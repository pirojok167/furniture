<footer id="footer" style="position: relative">
    <div class="layer-footer">
        <div class="d-flex h-100 w-100 layer-footer-content">
            <div class="loader m-auto">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center mt-5 mb-5">Оствьте заявку на ремонт, и мы свяжемся с вами в ближйшее время.</h4>
            </div>
            @if(!empty($contacts))
            <div class="col-md-5 col-sm-12 post">
                <b class="mb-2 big">Контакты:</b>
                <p class="mb-1">{{ $contacts->phone_1 }}</p>
                <p>{{ $contacts->phone_2 }}</p>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        {{ $error }}'
                    @endforeach
                @endif
                @if(Session::has('result') && !is_array(Session::get('result')))
                    {{ Session::get("result") }}
                @endif
                <p class="mb-0 big">Мы также есть в viber и whatsapp:</p>
                <p class="mt-3 fl">
                    <a href="viber://chat?number={{ $contacts->phone_1 }}">
                        <img class="icon icons8-Viber" width="48" height="48" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFFElEQVRoQ+WZjbEVNwyFpQoCFRAqCFQAVJBQAVBBoIKECoAKEioAKgAqACoIVJCXCpT57khvvLZle99dwjDxzM7927V1pKMj2VflOx/6ndsv/28AZvajiNwRkVt+8ZlrNN75j7x+FpH3qsrrlcbuCLjRD0Tk4cDYL25cGHVNRH4aWAgAAL1U1QC4BGgZgJlhxDM3PCbH0Ndu7EcR+aiqF6OV3QFEiajxercCB5hHq0CWAJjZryLyu4gA4h8R+ZNLVTH67OHOIaJcESkicX/mkCkAM/uj8PoLgMwmPQeRmQECZ90goiJyb7TeEEBhPF6/e5THZwA9IlATgRiCSAGY2S8i8sops9t4NwI6hCrB7S97FMfMMJ45Xqjq4x7wLgBf/IMvTgh3KQMLmdlfiUph1HNVfbkYCYD/ICI3e+AzAKBFcd6oKpFohpmhHoQY6Wt03MyYg3si0aNWwG0Gz5CkQyEwM/LhtywKGQC8z4K36wVcBqEWvzOQTaLUGFKADIPfe1QwCvA8+0RVUbXu8PWI5oWqXq9vagA4ff6G+6qKbG6GmQW48nsMIcSbGmBm1rEKY5+6suHZ1AHxrJlBYQA3Du0BiOSFGkja5XCPvk2c9U5V71X3M1dEimTmM3w+Ge2fAfFZVW8OovBcRKhFFLhNtHoAgnNPVZX3JYD4LVurWcCLIJGE829IYBGhFQkQfMa7UIn3zSgUsXFqDwD6+7PzeqM+xUQZgIZKZsZ3eJ1Bnjxy+uBR5n8iItAyjYKZEUXuofFDGC5HD0DwrStbZoYnQ0l6QDay60nIotART/P8bQfDPFCHNU/vszrh+dSA7AEgga+paqZQIxqlsgvSIhnxOjlBFMr3yCoM6NHoJAi1XT0A3RtjRlepKC7lQg0/aysKEUBOcQSCgCIxSOYm74p1T8xYBdBwrTTGzEIVyq+vz5q8AjzGMAcAaBDJk/MBFEVjBgBVISHLXEj5m1AiErOkUKNidQTqPNlQqAxxne0DOsRPafgzySqMg060HrcGSRzishGJGkAqV4kXayrtisIMWEXb43KgSuiSStMNyB6jKwBddcxUqNs4DbiMd6JYsdWkWB06oq9aUaFT5czqwCIIIoGmb9psM6OLpR9ijccre4Ii2sg7G6LNsc2oEjed38ilSaNHcrKbuqj21jEVRQvlmZ1kUMmR3KVWIu38ZpzwDTmHAHvGdGNTzNtsLXsRoGfBiGllHdCJlnd0kFU/SgSIePeEzsyYjw52qZ2GY+yAhj36hE4UumibV6MxaiNOCiQiTbXPGrY4DUibqxWrPPQACYUaPdY9PCha+E+qGpujy3kyAEGjZpe1Ynil33iOKsuVAUnpamYkL0ncbTNG50LR96f9yR4w3sihSrTQ5UjPfApl6+7PmWTlYGu66d4JJPbGRIYId8+cfBeG97kvpfLsaDE2L9Pjjz0gZve68RQ9wA7VcOVwt9yBnU7V/MBrWHxmRiYSjMHsC+I0ZCrlUwAs5EqA4dH/HxIR339QL1CX8giGw2ROwbunFCX4JQBFP8IiXBQVRnZyx+9wt5G9wffMxx8mFC3OTpcivAtAASRoVZ9AYDRFsDnR61AGL0NJDCWRSejdf5gcBsBlEtXA65w89847qe5X/kOvlzeHAKiMH+6nr5Lco2fOBuA0CM9/8n9ylvh7BJhzAbDzorJCm//c+GElHnmn+NMhbvsmxh8FYFpsjqBKNse5FPqmxl85Al/To3vn/hfxo6dPA/gGVgAAAABJRU5ErkJggg==">
                    </a>
                </p>
                <p class="mt-3 fl ml-3">
                    <a href="whatsapp://send?phone={{ $contacts->phone_1 }}">
                        <i class="fa fa-3x fa-whatsapp text-white" aria-hidden="true"></i>
                    </a>
                </p>
                <div class="clearfix"></div>
                <p class="mb-3"><span class="big">Email: </span>{{ $contacts->email ?? '' }}</p>
            </div>
            @endif
            <div class="col-md-7 mb-5 col-sm-12 post">
                <form id="form-footer" action="{{ route('sendOrder') }}" method="post">
                    {{ csrf_field() }}

                        <div class="form-group">
                                    <input class="form-control footer-input" type="text" name="name" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <input class="form-control footer-input phone" type="text" name="phone" placeholder="Телефон">
                        </div>
                        <div class="form-group">
                            <input class="form-control footer-input" type="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control footer-input" placeholder="Комментарий" name="comment" id="" rows="6"></textarea>
                        </div>
                        <div class="form-group d-flex">
                            <input class="pointer btn-send-footer btn btn-green ml-auto" type="submit" value="Отправить">
                        </div>

                </form>
            </div>
            <div class="col-12 text-center p-2">
                <hr class="m-0">
                <small>Разработано: <span style="text-decoration: underline">CodeEx</span></small>
            </div>
        </div>
    </div>
</footer>