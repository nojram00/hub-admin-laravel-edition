<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')

    <title>Items</title>
</head>
<body>
    <script>
        //AJAX Alternative (kase fetch API to...)
        document.addEventListener('DOMContentLoaded', function () {
            var detailClickElements = document.querySelectorAll('.detail-click');
            for (var i = 0; i < detailClickElements.length; i++) {
                detailClickElements[i].addEventListener('click', function () {
                    var id = this.getAttribute('data-id');

                    var tbody = document.getElementById('pi-body')
                    console.log(id);


                //clear table
                while(tbody.firstChild){
                    tbody.removeChild(tbody.firstChild);
                }

                //Handle text data:
                    fetch(`/processorItems/${id}`).then((res) => res.json())
                    .then((data) => {

                        console.log(tbody)
                        console.log(data.processor)

                        var processor_name = document.getElementById('processor_name');
                        processor_name.innerText = `${data.processor} Processor`

                        data.item.forEach((d) => {
                            console.log(d.item_name)
                            //create table row (<tr>)
                            const tr = document.createElement('tr')
                            tr.className = ""

                            //create <td> for item name
                            const item_name = document.createElement('td')
                            item_name.className = "uppercase"
                            item_name.innerText = d.item_name;
                            tr.appendChild(item_name);

                            //create <td> for item quantity
                            const quantity = document.createElement('td')
                            quantity.className = ""
                            quantity.innerText= d.item_qty;
                            tr.appendChild(quantity);

                            tbody.className = ""
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

    @include("partials.processor-items")
    @include("partials.add-processor")
    <header class="bg-light w-full z-20 h-[5rem]">

    </header>
    <div class="h-screen fixed w-full bg-blue-400 flex justify-end">
        {{-- Nav Bar --}}
        <div class="bg-slate-400 min-h-[80vh] w-[15rem] mx-3 my-2">
            @include('partials.nav-bar')
        </div>
        {{-- Table --}}
        <div class="w-[85vw] min-h-[90vh] mr-5 my-2 text-2xl bg-white p-2 flex flex-col justify-start">
            <div class="self-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add
                </button>
            </div>

            <table class="table table-primary text-center h-[81vh] my-[2rem] overflow-y-auto">
                <thead>
                    <th scope="col">Processor Name</th>
                    <th scope="col">Item Count</th>
                    <th scope="col">More</th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($processors as $processor)
                    <tr>
                        <td class="uppercase">{{$processor->processor}}</td>
                        <td>{{$processor->item_count}}</td>
                        <td class="hover:underline hover:cursor-pointer detail-click" data-id={{$processor->id}} data-bs-toggle="modal" data-bs-target="#processorInfo"><button class=" hover:underline" >View</button></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

</body>
</html>
