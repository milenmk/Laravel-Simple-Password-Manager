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
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">@sortablelink('name', __('Name'))</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">@sortablelink('email', __('Email'))</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Language')}}</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Theme')}}</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Registration date')}}</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Last update')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user->name}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user->email}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-center">{{$user->language}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-center">{{$user->theme}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-right">{{$user->created_at}}</td>
                                        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-right">{{$user->updated_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>
                        {{-- Pagination --}}
                        <div class="px-6 py-6">
                            {!! $users->links('vendor.pagination.tailwind') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
