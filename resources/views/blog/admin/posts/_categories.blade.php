@foreach ($categoryList as $categoryItem)
    <option value="{{ $categoryItem->id }}"
            @isset($postItem)
            @if ($categoryItem->id === $postItem->category_id) selected @endif
            @endisset

    > {{ $delimiter }}{{ $categoryItem->title ?? ''}}
    </option>
    @isset ( $categoryItem->children)
        @include('blog.admin.categories._categories',
               [ 'categories' => $categoryItem->children, 'delimiter' => ' - '. $delimiter])
    @endisset
@endforeach

