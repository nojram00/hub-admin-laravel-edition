{{-- <nav>
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
</nav> --}}
@php
    $navBarCols = [
        [
            'name' => 'Items',
            'link' => '/dashboard/categories',
            'dropdown' => true,
            'sub' =>  $categories,
        ],
        [
            'name' => 'Quotations',
            'link' => '/dashboard/quotations',
            'dropdown' => false,
        ]
    ]
@endphp


{{-- <nav class="navbar bg-body-tertiary h-full flex-column px-2">
    <div class="container-fluid ">
        <a class="navbar-brand w-full text-center hover:drop-shadow-xl hover:translate-x-5 transition-all bg-blue-500 my-3 py-3 rounded-md" href="#">Items</a>
        @foreach ($navBarCols as $nav)
            @if (!$nav['dropdown'])
                <a class="navbar-brand w-full text-center hover:drop-shadow-xl hover:translate-x-5 transition-all bg-blue-500 my-3 py-3 rounded-md" href="{{$nav['link']}}">{{$nav['name']}}</a>
            @else
                <ul class="dropdown-menu">
                    @foreach ($nav['sub'] as $sub)
                        <li><a class="dropdown-item" href="#">{{$sub['name']}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </div>
</nav> --}}

<nav class="nav flex-column h-full text-xl text-center bg-black py-5 rounded-sm">
    @foreach ($navBarCols as $nav)
        @if (!$nav['dropdown'])
            <a class="nav-link my-2" href="{{$nav['link']}}">{{$nav['name']}}</a>
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle my-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{$nav['name']}}</a>
                <ul class="dropdown-menu w-[90%] mx-3 transition-all text-center text-xl bg-blue-300">
                    {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li> --}}
                    @foreach ($nav['sub'] as $sub)
                        <li><a class="dropdown-item hover:text-blue-500 uppercase text-lg transition-all" href="/dashboard/items/{{$sub->id}}">{{$sub->category_name}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                    @endforeach
                </ul>
            </li>
        @endif

    @endforeach

    {{-- <a class="nav-link active" aria-current="page" href="#">Active</a> --}}
    {{-- <a class="nav-link" href="#">Link</a> --}}
    {{-- <a class="nav-link" href="#">Link</a> --}}
    {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
  </nav>
