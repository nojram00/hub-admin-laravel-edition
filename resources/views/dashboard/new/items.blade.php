<style>
    .underline:hover{
        text-decoration: underline;
    }
</style>

<script>
    //AJAX Alternative (kase fetch API to...)
    document.addEventListener('DOMContentLoaded', function () {
        var detailClickElements = document.querySelectorAll('.detail-click');
        for (var i = 0; i < detailClickElements.length; i++) {
            detailClickElements[i].addEventListener('click', function () {
                var id = this.getAttribute('data-id');

                console.log(id);
            //Handle text data:
                fetch(`/item/${id}`).then((res) => {
                    console.log(res);
                    return res.json();
                })
                .then((data) => {
                    console.log(data.single_price);
                    document.getElementById('item-name').innerText = data.item_name;
                    document.getElementById('item-single').innerText =  data.single_price;
                    document.getElementById('item-bundle').innerText =  data.bundle_price;
                    document.getElementById('delete-btn').setAttribute('data-item-id', id);
                    document.getElementById('item-image').src = data.item_image;
                })
                .catch((e) => {
                    console.error(e);
                });

                fetch(`/itemImage/${id}`).then((res) => res.blob()).then((blob) => {
                    // console.log("image: ", blob)

                    // var file = new File([blob], 'image', {type : blob.type})

                    // console.log("file: ",file)

                    var fileReader = new FileReader()
                    fileReader.readAsDataURL(blob)
                    fileReader.addEventListener('load', ()=> {
                        console.log("Image: ",fileReader.result);
                        document.getElementById('item-image').src = fileReader.result;
                    });


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


@include('star-dash-partials.top-template',['categoryName' => $items->category_name])

    <div class="content-wrapper">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add
        </button>
        <div class="table-responsive m-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Available Stock</th>
                        <th>Single Price</th>
                        <th>Bundle Price</th>
                        <th>Processor</th>
                        <th>Category</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items->items as $item)
                        <tr>
                            <td class="text-uppercase">{{$item->item_name}}</td>
                            <td>{{$item->item_qty}}</td>
                            <td>{{$item->single_price}}</td>
                            <td>{{$item->bundle_price}}</td>
                            <td class="text-uppercase">{{$item->processor->processor}}</td>
                            <td class="text-uppercase">{{$item->category->category_name}}</td>
                            <td class="detail-click pe-auto underline" style="cursor: pointer;" data-id={{$item->id}} data-bs-toggle="modal" data-bs-target="#details">View</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.view-item-modal')
    @include('partials.add-modal')

@include('star-dash-partials.bottom-template')



