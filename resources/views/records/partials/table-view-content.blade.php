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

@if ($records)

    @foreach ($records as $record)
        <tr class="<?=($c++%2==1) ? 'odd' : 'even' ?> border-b">
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $record->domain->name }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $record->type }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $record->url }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $record->username }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ $record->password }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <button type="submit"
                        class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                        hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <a href="{{ $record->id }}/record_edit" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{ __('Edit') }}</a>
                </button>
                <button type="submit"
                        class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                        hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <a href="{{ $record->id }}/record_delete" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{ __('Delete') }}</a>
                </button>
            </td>
        </tr>
    @endforeach

@else
    {{ __('No Records') }}
@endif
