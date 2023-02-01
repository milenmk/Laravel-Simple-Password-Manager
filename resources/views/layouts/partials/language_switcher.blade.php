@foreach($available_locales as $locale_name => $available_locale)
    @if($available_locale === $current_locale)
        <x-dropdown-link><b>{{ $locale_name }}</b></x-dropdown-link>
    @else
        <x-dropdown-link href="language/{{ $available_locale }}">{{ $locale_name }}</x-dropdown-link>
    @endif
@endforeach

