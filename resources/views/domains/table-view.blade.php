<section class="container mx-auto p-6 font-mono">
    <form method="get" action="domain_create">
        <h4><i class="fa fa-plus-square fa-2x" onclick="this.closest('form').submit();"></i></h4>
    </form>
    @include('domains.partials.table-header')
    @include('domains.partials.table-view-content')
    @include('domains.partials.table-footer')
</section>
