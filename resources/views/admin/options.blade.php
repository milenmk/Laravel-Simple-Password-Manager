<x-app-layout>
    @php
        $c = 0;
    @endphp

    <style>
        .even {
            background-color: #FFF;
        }

        .odd {
            background-color: #f3f4f6;
        }
    </style>
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
                        <section class="container mx-auto p-6 font-mono">
                            <table class="w-full">
                                <thead class="bg-white border-b">
                                <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('name', __('Name'))</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('value', __('Value'))</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{__('Description')}}</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($options as $option)
                                    <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-left">{{$option->name}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-left">{{$option->value}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace text-left">{{$option->description}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-center">
                                            <button type="submit"
                                                    class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <a href="{{ $option->id }}/option_edit" class="p-2 text-white text-xs font-thin">{{ __('Edit') }}</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>
                        {{-- Pagination --}}
                        <div class="px-6 py-6">
                            {!! $options->links('vendor.pagination.tailwind') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
