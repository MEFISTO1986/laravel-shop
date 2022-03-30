<ul>
    @foreach($categories as $category)
        <x-category-node-component :category="$category"></x-category-node-component>
    @endforeach
</ul>
