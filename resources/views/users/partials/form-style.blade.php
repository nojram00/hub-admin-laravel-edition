
<script type="text/javascript">

    // for adding addional field:
    function test(id, item, categoryName){
        var container = document.getElementById(id);

        console.log("container: ", container);
        console.log(item);
        console.log(categoryName);

        //create row;
        var row = document.createElement('div');
        row.className = 'row';
        container.appendChild(row);

        //create column for dropdown:
        var dr_col = document.createElement('div');
        dr_col.className = 'col';
        row.appendChild(dr_col);

        //create column for quantity:
        var qn_col = document.createElement('div');
        qn_col.className = 'col';
        row.appendChild(qn_col);

        //create label for dropdown:
        var dr_label = document.createElement('label');
        dr_label.for = categoryName.replace(' ', '-');
        dr_label.className = 'text-uppercase';
        dr_label.innerText = categoryName;
        dr_col.appendChild(dr_label);

        //create dropdown:
        var dropdown = document.createElement('select');
        dropdown.name = categoryName.replace(' ', '-');
        dropdown.className = 'form-select'
        dr_col.appendChild(dropdown);

        //create label for quantity

        //create initial option:
        var option_default = document.createElement('option');
        option_default.innerText = `Select a ${categoryName}`
        option_default.className = "text-uppercase"
        dropdown.appendChild(option_default);

        //create option for each Item inside:
        item?.forEach(element => {

        });

    }

    let quotations = [];
    function anotherTest(){
        quotations = [];
        var dropdowns = document.getElementsByClassName('dr-inputs')
        var qInputs = document.getElementsByClassName('quantity-inputs')

        inputArray = Array.from(qInputs);
        dropdownArray = Array.from(dropdowns);
        console.log(dropdowns);

        dropdownArray.forEach((dropdown) => {
            if(dropdown.value){
                try{
                    // var data = JSON.parse({
                    //     item_id : dropdown.value
                    // });
                    data = {item_id : dropdown.value}
                    quotations.push(data);
                    console.log(data);
                }
                catch(e){
                    console.error("BOBO! ", e);
                }
            }
        })

        // for(i = 0; i < dropdowns.length; i++){
        //     if(qInputs[i].value && dropdowns[i].value){
        //         try
        //         {
        //             data = {
        //                 item_id = dropdowns[i].value,
        //                 item_quantity = qInputs[i].value
        //             }
        //         }
        //         catch (e){
        //             console.error("BOBO! ",e);
        //         }

        //     }
        // }

        console.log('Quotations: ', quotations);

        if (quotations.length > 0) {
            fetch('/user/submitQuotation', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({quotations}),
                })
                .then((res) => res.json())
                .then((data) => {
                    console.log("data: ", data);
                    alert('Quotation added!');
                })
                .catch((error) => {
                    console.error(error);
                    alert('Please try again...');
                });
        } else {
            console.warn("No valid JSON data to send.");
        }
    }

    //     fetch('/user/submitQuotation', {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //         },
    //         body: JSON.stringify(quotations),
    //     })
    //     .then((res) => res.json())
    //     .then((data) => console.log("data: ",data))
    //     .catch((error) => console.error(error));
    // }
</script>

<div class=" d-flex flex-column justify-content-between align-items-baseline" style="transform: translateX(-50%); transform: translateY(10%); width: 100%;">
    {{-- <div class="ram-container">
s
    </div> --}}
    {{-- <div class="overflow-y-scroll">

    </div> --}}
    @foreach ($categories as $category)

            <div class="container" id="{{str_replace(' ', '-', $category->category_name.'-id')}}">
                {{-- @if ($category->category_name == 'ram')
                    <button class="m-3 btn btn-primary" onclick="test('{{ str_replace(' ', '-', $category->category_name.'-id') }}', {{$category->items}}, '{{$category->category_name}}')">Add Ram</button>
                @endif --}}
                <div class="row">
                    <div class="col">
                        <label for="{{$category->category_name}}" class="text-uppercase">{{$category->category_name}}</label>
                        <select name="{{$category->category_name}}" id="" class="form-select dr-inputs">
                                <option value="" selected class="text-uppercase">Select {{$category->category_name}}</option>
                            @foreach ($category->items as $item)
                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col p-4">
                        <label for="{{$category->category_name.'name'}}" class="">Quantity</label>
                        <input type="number" name="{{$category->category_name.'name'}}" id="{{str_replace(' ','-', $category->category_name)}}" class="form-text quantity-inputs">
                    </div>
                </div>
            </div>
        @endforeach



    <button class="btn btn-primary mx-auto my-5" onclick="anotherTest()">Build</button>
</div>
