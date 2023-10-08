<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')

    <title>Items - <p class="uppercase">{{$items->category_name}}</p></title>
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
                //Handle text data:
                    fetch(`/item/${id}`).then((res) => res.json())
                    .then((data) => {
                        console.log(data.single_price);
                        document.getElementById('item-name').innerText = data.item_name;
                        document.getElementById('item-single').innerText =  data.single_price;
                        document.getElementById('item-bundle').innerText =  data.bundle_price;
                        document.getElementById('delete-btn').setAttribute('data-item-id', id);
                        // document.getElementById('item-image').src = data.item_image;
                    })
                    .catch((e) => {
                        console.error(e);
                    });

                    fetch(`/itemImage/${id}`).then((res) => res.blob()).then((blob) => {
                        // console.log("image: ", blob)

                        // var file = new File([blob], 'image', {type : blob.type})

                        // console.log(file)

                        var fileReader = new FileReader()
                        fileReader.readAsDataURL(blob)
                        fileReader.addEventListener('load', ()=> {
                            console.log(fileReader.result);
                        })

                        // document.getElementById('item-image').src = data;
                    }).catch((e) => {
                        console.error(e);
                    });
                });
            }
            });

        function readFile(blobData){
                var fileReader = new FileReader()
                fileReader.readAsDataURL(blobData)
                fileReader.addEventListener('load', () => {
                    const res = fileReader.result;

                    // var imageSauce = document.getElementById('item-image');
                    // imageSauce.src = res;
                    console.log(res)
                    return res;
            })
        }

    </script>

    @include('partials.add-modal')
    @include('partials.view-item-modal')
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
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Single Price</th>
                    <th scope="col">Bundle Price</th>
                    {{-- <th scope="col">Category</th> --}}
                    <th scope="col">Processor</th>
                    <th scope="col">More</th>
                </thead>
                <tbody class="table-group-diveder">
                    @foreach ($items->items as $item)
                    <tr>
                        <td class="capitalize">{{$item->item_name}}</td>
                        <td>{{$item->item_qty}}</td>
                        <td>{{$item->single_price}}</td>
                        <td>{{$item->bundle_price}}</td>
                        {{-- <td class="uppercase">{{$item->category_name}}</td> --}}
                        <td class="uppercase">{{$item->processor->processor}}</td>
                        <td class="hover:underline hover:cursor-pointer detail-click" data-id={{$item->id}} data-bs-toggle="modal" data-bs-target="#details">View</td>

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
