<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')

    <title>Categories</title>
</head>
<body>
    <script>
        //AJAX Alternative (kase fetch API to...)
        document.addEventListener('DOMContentLoaded', function () {
            var detailClickElements = document.querySelectorAll('.detail-click');
            for (var i = 0; i < detailClickElements.length; i++) {
                detailClickElements[i].addEventListener('click', function () {
                    var id = this.getAttribute('data-id');

                    console.log(id);

                    var tbody = document.getElementById('ci-body');

                //clear:
                while(tbody.firstChild){
                    tbody.removeChild(tbody.firstChild);
                }

                //Handle text data:
                    fetch(`/itemCategory/${id}`).then((res) => res.json())
                    .then((data) => {
                        console.log(data.items);
                        var category_name = document.getElementById('category-name');
                        category_name.innerText = `${data.category_name}`;

                        var items = data.items;
                        console.log("items: ", items);
                        items.forEach((item) => {
                            console.log(item)

                            var tr = document.createElement('tr');
                            tr.className = "";

                            var item_name_td = document.createElement('td');
                            item_name_td.className = "uppercase";
                            item_name_td.innerText = item.item_name;
                            tr.appendChild(item_name_td);

                            var item_quantity_td = document.createElement('td');
                            item_quantity_td.className = "";
                            item_quantity_td.innerText = item.item_qty;
                            tr.appendChild(item_quantity_td);

                            tbody.appendChild(tr);
                        });

                    })
                    .catch((e) => {
                        console.error(e);
                    });
                });
            }
            });

    </script>

    {{-- @include('partials.add-modal') --}}
    @include('partials.category-items')
    <header class="bg-white w-full z-20 h-[5rem]">

    </header>
    <div class="h-screen fixed w-full bg-blue-400 flex justify-end">
        {{-- Nav Bar --}}
        <div class="bg-slate-400 min-h-[90vh] w-[15rem] mx-3 my-2">
            @include('partials.nav-bar')
        </div>
        {{-- Table --}}
        <div class="w-[85vw] min-h-[90vh] mr-5 my-2 text-2xl bg-white p-2 flex flex-col items-center justify-start">
            <div class="self-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add
                </button>
            </div>

            <table class="table table-primary text-center h-[81vh] mt-[2rem] overflow-y-auto">
                <thead>
                    <th scope="col">Category</th>
                    <th scope="col">Item Count</th>
                    <th scope="col">More</th>
                </thead>
                <tbody class="table-group-divider">
                        @if ($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <td class="uppercase">{{$category->category_name}}</td>
                                <td class="">{{$category->items_count}}</td>
                                <td class="hover:underline hover:cursor-pointer detail-click" data-bs-toggle="modal" data-id={{$category->id}} data-bs-target="#categoryItems">View</td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

</body>
</html>
