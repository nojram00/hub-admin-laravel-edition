@include('users.partials.header', ['title' => 'Products'])

    {{-- @include('users.partials.carousel') --}}
    <main id="main" class="">
        {{-- @include('users.static.about') --}}
        @include('users.partials.dynamic-item-container', ['products' => $items->category_name, 'productList' => $items->items])
    </main>

@include('users.partials.js-essentials')
