<li>
    <a href="#">{{ $category['name'] }}</a>
    <div class="dropdown">
        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <i class="dw dw-more"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="{{ route('category.create') }}"><i class="dw dw-add"></i> Add</a>
            <a class="dropdown-item" href="{{ route('category.show', $category['id']) }}"><i class="dw dw-eye"></i> View</a>
            <a class="dropdown-item" href="{{ route('category.edit', $category['id']) }}"><i class="dw dw-edit2"></i> Edit</a>
            <form method="POST" action="{{ route('category.destroy', $category['id']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</button>
            </form>
        </div>
    </div>
</li>
@if($childs)
    <li class="child">
        <x-category-tree-component :categories="$childs"></x-category-tree-component>
    </li>
@endif
