<div class="service-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <x-alphapager-list><x-slot:slug>brands</x-slot:slug></x-alphapager-list>
                <div class="row">
                    <div id="yw0" class="list-view">
                        @include('brands.catalog-items')
                        @include('brands.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
