<script type="text/javascript">

    let item_name = null
    let quantity = null;
    let price = null;
    function checkNum(){
        if(quantity.value <= 0 || price.value <= 0){
            event.preventDefault();
            console.log("hatdog")
            alert('please enter a valid quantity and price.')
            return false;
        }

        document.getElementById('this-form').reset()
        return true;
    }

    function SubmitForm() {
        fetch('/submit')
    }

    function handleItemName () {
        item_name = document.getElementById('name')
        console.log(item_name.value)
    }

    function getImage(){
        img = document.getElementById('item-image')
        console.log(img.value);
    }

    function checkquantity() {
        var qlabel = document.getElementById('quantity_label')
        quantity = document.getElementById('quantity')
        console.log("quantity: ", quantity.value) // empty output
        if (parseInt(quantity.value) <= 0){

            qlabel.style.property="display: block;"

        }else{
            qlabel.style.property="display: none;"
        }
    }

    function checkPrice() {
        price = document.getElementById('price')
        console.log('price: ', price.value)
    }
</script>

{{-- Add form modal --}}
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-blue-400">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/submitItemForm" method="POST" onsubmit="" id="this-form" class="bg-blue m-2 text-lg">
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="item_name">Item name: </label>
                    </div>
                    <div class="col text-left">
                        <div class="row">
                            <input type="text" name="item_name" onchange="handleItemName()" id="name" class="border form-control text-black"/><br>

                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="item_quantity">Quantity: </label>
                    </div>
                    <div class="col text-left">
                        <input type="number" name="item_quantity" onchange="checkquantity()" id="quantity" class="border form-control text-black" />
                        <label for="item_quantity" style="display: none;" id="quantity_label"><p class=" text-red-400 ">please enter a valid quantity</p></label>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="single_price">Single Price: </label>
                    </div>
                    <div class="col text-left">
                        <input type="number" name="single_price" id="price" onchange="checkPrice()" class="border form-control text-black" />
                        <label for="single_price" style="display: none;"><p class=" text-red-400 ">please enter a valid quantity</p></label>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="bundle_price">Bundle Price: </label>
                    </div>
                    <div class="col text-left">
                        <input type="number" name="bundle_price" id="price" onchange="checkPrice()" class="border form-control text-black" />
                        <label for="bundle_price" style="display: none;"><p class=" text-red-400 ">please enter a valid quantity</p></label>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="processor">Processor: </label>
                    </div>
                    <div class="col">
                        <select name="processor" id="" class="uppercase p-2 border">
                            {{-- <option value="">intel</option> --}}
                            @foreach ($processors as $processor)
                                <option value="{{$processor->id}}" class="uppercase">{{$processor->processor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="category">Category: </label>
                    </div>
                    <div class="col">
                        <select name="category" id="" class="uppercase p-2 border">
                            {{-- <option value="">intel</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" class="uppercase">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col text-center">
                        <label for="item_image">Image(optional but recommended): </label>
                    </div>
                    <div class="col">
                        <input type="file" name="item_image" accept="image/jpg, image/png" id="item-image" onchange="getImage()">
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" onclick="">Add</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>
