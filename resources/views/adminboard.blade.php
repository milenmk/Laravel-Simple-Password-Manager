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
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-roboto">
                                {{__('Users')}}
                                <span class="float-right">{{count($users)}}</span>
                            </section>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-roboto">
                                {{__('Domains')}}
                                <span class="float-right">{{count($domains)}}</span>
                            </section>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-roboto">
                                {{__('Records')}}
                                <span class="float-right">{{count($records)}}</span>
                            </section>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <section class="container mx-auto p-6 font-roboto">
                                <h3>{{__('Top :attribute users by domain number',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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
                            <section class="container mx-auto p-6 font-roboto">
                                <h3>{{__('Top :attribute users by records number',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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
                            <section class="container mx-auto p-6 font-roboto">
                                <h3>{{__('Last :attribute users',['attribute' => config('NUM_LIMIT_ADMIN_DASHBOARD')])}}</h3>
                            </section>

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
