<div class="catalog__items">
    @foreach($categories as $category)
        <div class="col-md-4">
            <a style="color: #0a6aa1;font-weight: 800" href="/store/{{ $category->slug }}"
            class="catalog__category-item-title">
                <h3>{{ $category->name }}</h3>
            </a>
        </div>
    @endforeach
</div>
