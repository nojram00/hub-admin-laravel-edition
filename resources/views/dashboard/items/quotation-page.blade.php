<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    {{-- <script src="{{asset()}}"></script> --}}

    <title>Quotations</title>
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

                    var tbody = document.getElementById('qi-body');

                //clear:
                while(tbody.firstChild){
                    tbody.removeChild(tbody.firstChild);
                }

                //Handle text data:
                    fetch(`/quotations/details/${id}`).then((res) => res.json())
                    .then((data) => {
                        console.log("Quotation Items: ", data.quotation_items);
                        // var quotation_name = document.getElementById('quotation-name');
                        // // category_name.innerText = `${data.category_name}`;

                        var qItems = data.quotation_items;

                        let bundleprice = [];
                        // console.log("items: ", items);
                        qItems.forEach((item) => {
                            console.log("item name: ", item.item.item_name)
                            var indivItem = item.item;

                            // indivItem.forEach((i) => {
                            //     console.log("item: ", i)
                            // })

                            var tr = document.createElement('tr');
                            tr.className = "";

                            var item_name_td = document.createElement('td');
                            item_name_td.className = "uppercase";
                            item_name_td.innerText = item.item.item_name;
                            tr.appendChild(item_name_td);

                            var item_quantity_td = document.createElement('td');
                            item_quantity_td.className = "text-center";
                            item_quantity_td.innerText = item.qi_count;
                            tr.appendChild(item_quantity_td);

                            var item_category_td = document.createElement('td');
                            item_category_td.className = "uppercase";
                            item_category_td.innerText = item.item.category.category_name;
                            tr.appendChild(item_category_td);

                            var single_price_td = document.createElement('td');
                            single_price_td.className="";
                            single_price_td.innerText = item.item.single_price;
                            tr.appendChild(single_price_td);

                            var bundle_price_td = document.createElement('td');
                            bundle_price_td.className = "";
                            bundle_price_td.innerText = item.item.bundle_price;
                            tr.appendChild(bundle_price_td);

                            var total_per_item = document.createElement('td');
                            total_per_item.className = "";
                            if(item.qi_count > 1){
                                total_per_item.innerText = item.item.bundle_price * item.qi_count;
                            }else{
                                total_per_item.innerText = item.item.single_price;
                            }
                            tr.appendChild(total_per_item);


                            if(item.qi_count > 1){
                                bundleprice.push(item.item.bundle_price * item.qi_count)
                            }

                            tbody.appendChild(tr);
                        });

                        var total = document.getElementById('total');
                        total.innerText = 'Total: ' + bundleprice.reduce((partial, a) => partial + a, 0);

                    })
                    .catch((e) => {
                        console.error(e);
                    });
                });
            }
            });

    </script>

    @include('partials.add-quotation')
    {{-- @include('partials.side-bar') --}}
    @include('partials.quotation-items')
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-quotation">
                    Add
                </button>
            </div>

            <table class="table table-primary text-center h-[81vh] mt-[2rem] overflow-y-auto">
                <thead>
                    <th scope="col">Quotation Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Quotation Date</th>
                    <th scope="col">More</th>
                </thead>
                <tbody class="table-group-divider">
                    {{-- @if ($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <td class="uppercase">{{$category->category_name}}</td>
                                <td class="">{{$category->item_count}}</td>
                                <td class="hover:underline hover:cursor-pointer" data-bs-toggle="modal" data-bs-target="#quotationInfo"><button class="detail-click hover:underline" data-id={{$category->id}}>View</button></td>
                            </tr>
                        @endforeach
                    @endif --}}
                    @if ($quotations)
                        @foreach ($quotations as $quotation)
                        <tr>
                            <td class="">{{$quotation->id}}</td>
                            <td class="">{{$quotation->user->name}}</td>
                            <td class="">{{$quotation->Date_Quoted}}</td>
                            <td class="hover:underline hover:cursor-pointer" data-bs-toggle="modal" data-bs-target="#quotationInfo"><button class="detail-click hover:underline" data-id={{$quotation->id}}>View</button></td>
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
