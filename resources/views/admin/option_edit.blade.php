<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            @include('admin.navigation')
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                        <div class="container mx-auto p-6 font-mono">
                            <form action="option_update" method="post">
                                @csrf
                                <div>
                                    <x-input-label for="name" :value="__('Name')"/>
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $option->name)" disabled
                                                  autocomplete="name"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="value" :value="__('Value')"/>
                                    <x-text-input id="value" name="value" type="text" class="mt-1 block w-full" :value="old('value', $option->value)" required autofocus
                                                  autocomplete="value"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('value')"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')"/>
                                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $option->description)"
                                                  autocomplete="description"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                                </div>
                                <div class="flex items-center gap-4 mt-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
