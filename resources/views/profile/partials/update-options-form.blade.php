<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Options') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's language and theme preferences.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Language')" />
            <x-text-input id="language" name="language" type="text" class="mt-1 block w-full" :value="old('language', $user->language)" autocomplete="language" />
            <x-input-error class="mt-2" :messages="$errors->get('language')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Theme')" />
            <x-text-input id="theme" name="theme" type="text" class="mt-1 block w-full" :value="old('theme', $user->theme)" autocomplete="theme" />
            <x-input-error class="mt-2" :messages="$errors->get('theme')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
