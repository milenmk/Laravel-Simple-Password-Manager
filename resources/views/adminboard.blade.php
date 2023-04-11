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
                <div class="col-span-3">Dashboard</div>
            </div>
        </div>
    </div>
</x-app-layout>
