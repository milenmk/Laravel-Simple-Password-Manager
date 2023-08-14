<section class="container mx-auto p-6 font-roboto">
    <form method="get" action="record_create">
        <h4><i class="fa fa-plus-square fa-2x" onclick="this.closest('form').submit();"></i></h4>
    </form>
    @include('records.partials.table-header')
    @include('records.partials.table-view-content')
    @include('records.partials.table-footer')
</section>
