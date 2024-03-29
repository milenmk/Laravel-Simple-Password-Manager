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
            <td class="text-sm text-gray-900 font-light px-2 py-2">{{ $record->domain->name }}</td>
            <td class="text-sm text-gray-900 font-light px-2 py-2">{{ $record->type }}</td>
            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap"><a href="https://{{ $record->url }}" target="_blank">{{ $record->url }}</a>
                <i class="fa fa-share-square"></i>
            </td>
            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">{{ $record->username }}
                <i class="fa fa-clipboard" id="copy_icon" onclick="copyToClipboard('{{ $record->username }}')" data-toggle="tooltip" title="{{ __('Copy') }}"></i>
            </td>
            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">{{ $record->password }}
                <i class="fa fa-clipboard" id="copy_icon" onclick="copyToClipboard('{{ $record->password }}')" data-toggle="tooltip" title="{{ __('Copy') }}"></i>
            </td>
            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                <button type="submit"
                        class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                        hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <a href="{{ $record->id }}/record_edit" class="p-2 text-white text-xs">{{ __('Edit') }}</a>
                </button>
                <button type="submit"
                        class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                        hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <a href="{{ $record->id }}/record_delete" class="p-2 text-white text-xs">{{ __('Delete') }}</a>
                </button>
            </td>
        </tr>
    @endforeach

@else
    {{ __('No Records') }}
@endif
