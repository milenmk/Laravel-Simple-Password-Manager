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

@foreach ($domains as $domain)
    <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{ $domain->name }}</td>
        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{ $domain->database }}</td>
        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{ $domain->ftp }}</td>
        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">{{ $domain->website }}</td>
        <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap">
            <button type="submit"
                    class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <a href="{{ route('records') }}?domain_id={{ $domain->id }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{ __('View Records') }}</a>
            </button>
            <button type="submit"
                    class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <a href="{{ $domain->id }}/edit" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{ __('Edit') }}</a>
            </button>
            <div class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
            hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <form action="{{route('domains.destroy',[$domain->id])}}" method="post">
                    @csrf
                    {{method_field('delete')}}
                    <button type="submit"
                            class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                            hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Delete') }}
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
