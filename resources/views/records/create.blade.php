<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6 font-roboto">
                    <form action="{{ route('records.store') }}" method="post" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="domain" :value="__('Domain')"/>
                            <select name="domain" id="domain" class="bg-white mt-1 border rounded-lg w-full" required>
                                <option value=""></option>
                                @foreach($domains as $domain)
                                    <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')"/>
                            <select name="type" id="type" class="bg-white mt-1 border rounded-lg w-full" required>
                                <option value=""></option>
                                @php
                                    $types = explode(',', config('RECORDS_TYPES'));
                                @endphp
                                @foreach($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')"/>
                        </div>

                        <div>
                            <x-input-label for="url" :value="__('Url')"/>
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" required autofocus="url"/>
                            <x-input-error class="mt-2" :messages="$errors->get('url')"/>
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')"/>
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" required autocomplete="username"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')"/>
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')"/>
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('password')"/>
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
