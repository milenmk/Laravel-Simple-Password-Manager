<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6 font-mono">
                    <form action="record_update" method="post" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="domain" :value="__('Domain')"/>
                            <x-text-input id="domain" name="domain" type="text" class="mt-1 block w-full" :value="old('domain', $record->domain->name)" disabled
                                          autocomplete="domain"/>
                            <x-input-error class="mt-2" :messages="$errors->get('domain')"/>
                        </div>

                        <div>
                            <label for="type">{{__('Type')}}</label>
                            <select name="type" id="type" class="bg-white mt-1 border rounded-lg w-full" required>
                                <option value=""></option>
                                @php
                                    $types = explode(',', config('RECORDS_TYPES'));
                                @endphp
                                @foreach($types as $type)
                                    @if($type == $record->type)
                                        <option value="{{ $type }}" selected>{{ $type }}</option>
                                    @else
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')"/>
                        </div>


                        <div>
                            <x-input-label for="url" :value="__('Url')"/>
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" :value="old('url', $record->url)" required autocomplete="url"/>
                            <x-input-error class="mt-2" :messages="$errors->get('url')"/>
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')"/>
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $record->username)" required
                                          autocomplete="username"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')"/>
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')"/>
                            <x-text-input id="password" name="password" type="text" class="mt-1 block w-full" :value="old('password', $record->password)" required
                                          autocomplete="password"/>
                            <x-input-error class="mt-2" :messages="$errors->get('password')"/>
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
