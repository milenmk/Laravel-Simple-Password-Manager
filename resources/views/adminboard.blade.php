<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                <div class="mt-1 mb-4">
                                    <a href="{{ route('adminboard') }}">{{__('Dashboard')}}</a>
                                </div>
                                <hr>
                                <div class="mt-4 mb-4">
                                    <a href="{{ route('admin.users') }}">{{__('Users')}}</a>
                                </div>
                                <hr>
                                <div class="clear-both"></div>
                                <div class="mt-4 mb-4">
                                    <a href="{{ route('admin.options') }}">{{__('Options')}}</a>
                                </div>
                                <hr>
                                <div class="clear-both"></div>
                                <div class="mt-4 mb-4">
                                    <div class="inline-flex items-center">
                                        <a class="mr-2" href="{{ route('index') }}">{{__('Go to site')}}</a>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                {{__('Users')}}
                                <span class="float-right">{{count($users)}}</span>
                            </section>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                {{__('Domains')}}
                                <span class="float-right">{{count($domains)}}</span>
                            </section>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                {{__('Records')}}
                                <span class="float-right">{{count($records)}}</span>
                            </section>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                <h3>{{__('Top :attribute users by domain number',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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

                            <div class="m-5 overflow-hidden rounded-lg shadow-lg">
                                <div class="w-full">
                                    <table class="w-full">
                                        <thead class="bg-white border-b">
                                        <tr class="text-md font-semibold tracking-wide bg-gray-100 uppercase border-b border-gray-600">
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{__('User')}}</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Number of records')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_domains as $user_domain)
                                            <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
                                                <td class="text-sm text-left text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user_domain->name}}</td>
                                                <td class="text-sm text-center text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{count($user_domain->domains)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                <h3>{{__('Top :attribute users by records number',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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

                            <div class="m-5 overflow-hidden rounded-lg shadow-lg">
                                <div class="w-full">
                                    <table class="w-full">
                                        <thead class="bg-white border-b">
                                        <tr class="text-md font-semibold tracking-wide bg-gray-100 uppercase border-b border-gray-600">
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{__('User')}}</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Number of records')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_records as $user_record)
                                            <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
                                                <td class="text-sm text-left text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user_record->name}}</td>
                                                <td class="text-sm text-center text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{count($user_record->records)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-mono">
                                <h3>{{__('Last :attribute users',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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

                            <div class="m-5 overflow-hidden rounded-lg shadow-lg">
                                <div class="w-full">
                                    <table class="w-full">
                                        <thead class="bg-white border-b">
                                        <tr class="text-md font-semibold tracking-wide bg-gray-100 uppercase border-b border-gray-600">
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{__('User')}}</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">{{__('Registration date')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
                                                <td class="text-sm text-left text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user->name}}</td>
                                                <td class="text-sm text-center text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{$user->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
