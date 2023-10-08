<script>
    let quantity = []
    let item_name = []

    function handleClick(){
        // preventDefault();
        item_name = []
        quantity = []
        let items = []
        var items_selection = document.getElementsByClassName('items-select');
        var items_quantity = document.getElementsByClassName('quantity');
        console.log(items_quantity);
        var qArray = Array.from(items_quantity);
        var itemArray = Array.from(items_selection);
        // console.log(itemArray);

        for(i = 0; i < itemArray.length; i++){
            // console.log("value: ", itemArray[i].value)
            // console.log("quantity: ", qArray[i].value)
            if(qArray[i].value !== '' && itemArray[i].value !== '')
            {
                items.push({
                    itemId : itemArray[i].value,
                    itemQuantity : qArray[i].value
                })
            }
        }


        itemArray.forEach((item) => {
            // console.log(item.value);
            // item_name.push(item.value);
        });

        qArray.forEach((item) => {
            // console.log(item.value);
            // quantity.push(item.value);
        })

        // console.log(item_name);
        // console.log(quantity);
        console.log("items: ",items);

        fetch('/submitQuotation', {
                method: 'POST',
                body: JSON.stringify({
                    items
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((res) => {
                console.log(res.data);
                if (!res.ok) {
                    throw new Error('Network response was not ok');
                }
                alert('Add success');
                window.location.reload();
                return res.json();
            })
            .then((data) => {
                console.log("data",data);
            })
            .catch((error) => {
                console.error('Fetch error:', error);
            });
    }



</script>


<div class="modal fade" id="add-quotation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-blue-400">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">New Quotation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/submitQuotation" method="POST">
                @foreach ($categories as $category)
                    <div class="container flex-row flex justify-between my-2">
                        <label for="ram">Select a {{$category->category_name}}</label>
                        {{-- @if ($category->category_name != 'ram')
                        <select name="" id="" class="border">
                            <option value="" class="mx-auto">Select</option>
                            @foreach ($category->items as $item)
                                <option value="">{{$item->item_name}}</option>
                            @endforeach
                        </select>
                        @else
                            <div>
                                <select name="" id="">
                                    @foreach ($category->items as $item)
                                        <input type="radio" name="" id="" value="{{$item->item_name}}">
                                        <input type="checkbox" name="" id="">{{$item->item_name}}
                                    @endforeach
                                </select>
                            </div>

                        @endif --}}
                        <select name="" id="" class="border items-select">
                            <option value="" class="mx-auto">Select</option>
                            @foreach ($category->items as $item)
                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                            @endforeach
                        </select>

                        <label for="ram-quantity">Quantity</label>
                        <input type="number" name="" id="" value="" class="border quantity">
                    </div>
                @endforeach
                {{-- <div class="container flex justify-between my-2">
                    <label for="ram">Select a Ram</label>
                    <select name="" id="" class="border">
                        <option value="">Select</option>
                    </select>
                    <label for="ram-quantity">Quantity</label>
                    <input type="number" name="" id="" class="border">
                </div>
                <div class="container flex justify-between my-2">
                    <label for="ram">Select a Ram</label>
                    <select name="" id="">
                        <option value="">Select</option>
                    </select>
                    <label for="ram-quantity">Quantity</label>
                    <input type="number" name="" id="">
                </div> --}}
                {{-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Select A Ram
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select name="" id="" class="border">
                                <option value="">Select</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Select A Motherboard
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                      </div>
                    </div>
                  </div> --}}
            </div>
            <button class="btn btn-primary w-[20%] mx-auto my-3" type="button" onclick="handleClick()">Submit</button>

            </form>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary" onclick="SubmitAll()">Submit</button> --}}
        </div>
      </div>
    </div>
  </div>
