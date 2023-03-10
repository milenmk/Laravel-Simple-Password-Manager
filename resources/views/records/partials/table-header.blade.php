{{-- Pagination --}}
<div class="px-6 py-6">
    {!! $records->links('vendor.pagination.tailwind') !!}
</div>
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
        <table class="w-full">
            <thead class="bg-white border-b">
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('domain.name', __('Domain'))</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('type', __('Type'))</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('url', __('Url'))</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">@sortablelink('username', __('Username'))</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{ __('Password') }}</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
            </tr>
            </thead>
            <tbody>
