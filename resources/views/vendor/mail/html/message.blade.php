@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
<img class="icon icons8-Диван-Filled" width="50" height="50" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAD4klEQVRoQ+1Z21XbQBC9I0jyGVJBzDnBzh/uAFNBbLkAlgpsKsCuIFABSwF+pAJEB+YvNjknpoI4nzhBkzOKnPixsiSwLIV4f3d2du7M7LyW8EwWPRMc2ADJmiU3FtlYJCENbFwrIcU+mu3GIo9WXUIH/z+L5NvHR2AugVAkoJiQYj22DPTA6IHIGdgXl1HuCrVIvqPKxPgIIBeFYQI0QyacDCq6u4z3UiD5lroggkpAuNgsXcbZbVWfBB0MBJIlEFPCn/dtXTeBMQLx3akTW21rOMCEisnNjEAKbfU1xTcRpo5h39a780QLQPZaSlmEizBuae6brLIAJN9WmoCjNAUNu5uBy4GtZ4LQApBCWzkADsKYpbx/3bd1aVoGExBOWchI1/dtcZy/KzD8vuuoErnIWUADhLeRuCdFxLhzRQ4LvduK7kUOv/OEhZaqg7zsvv7FOOlX9VnYxX8sstdRRXJRA6FMwA4AhwnOoKKbwiSNaOYyjm+rWuc6auclUCOGvIsSAyMwupaF5ueKHop8HpBlQkoBNyYcDit6tOaI5mVxDwTjKqhQnYCl9x2VY4YkwGXL6dv6MCJtmBeE7jPj+9hCTpRXaKsrscKyQ0TYpahafiAcfqloZ55eLiVCjxkOAaMHC95j3AaGE7NPCyFBxHMFFzmSilraAkZxLqB41hDaLYYAWbokrwiQb/6bCCWWJORbpS7vZww4orWwi6LsiwttA0XLRcmyoEUJUawhvOXNUKGtIucNMeG8lj0BmPa3iIsM7PgPUphLAyZBY35JwoXL6JGFkcvk/CS+mVdIHDf2vCJOJhcTWoSGy3Qg3SKR57urariG4p7SFVrE1y6jEaNUuqY0wmoUV4tDI5HLC7/5tuoRsB/ncFZoGbgZ2FrcGPBj9VkMU2YCh7j6mFCX9zVTa+VbqkGE00xIGRZyGc1BVTcmZDNAxDKvGN/+BSD3hDfTkc7UWHUJ+JBlMAx8Gti6PC3jIpDfc6xMDh4mgkdqdYW40FLD1HuQIJdg3PWreiF3BU1RpP6vZdS9jLMtI5A45cG6wZrKJK8IDRIkalW8TiCm6Ykx/E4L5YdiGRxnZaJyfU8oB1XbkabxYEgkky+F9Q4hGHdM8r0A/ahpvFjjhYvTHxaaq+o3nuqCk759DJybZDIPsf1SRRoWZmgm6pp6hqcKF3Z+0usQc1m+N6S/4bnSZOkbCRpiTxr9MAFWsb+kvYg2xPbK+pYaEeH1jEABiWgVQgfxMCVm6QYHVb3QeZpdyzDIDvqXSBKI6Z8mKAQbgfihV0rkmtcPA40o074kQMmUkwFpL8RDzu8JDdNj/wXixrY61q3ydwAAAABJRU5ErkJggg==">
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ config('app.name') }}. Все права защищены.
        @endcomponent
    @endslot
@endcomponent