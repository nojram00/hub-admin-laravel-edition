<script>

    function stringGrouper(targetstring){
        return targetstring.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ');
    }

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
                        item_name_td.className = "text-uppercase";
                        item_name_td.innerText = item.item.item_name;
                        tr.appendChild(item_name_td);

                        var item_quantity_td = document.createElement('td');
                        item_quantity_td.className = "";
                        item_quantity_td.innerText = item.qi_count;
                        tr.appendChild(item_quantity_td);

                        var item_category_td = document.createElement('td');
                        item_category_td.className = "text-uppercase";
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
                    var totalprice = bundleprice.reduce((partial, a) => partial + a, 0);
                    total.innerHTML = '<h3>Total: ' + stringGrouper(totalprice.toString()) + '</h3>';

                })
                .catch((e) => {
                    console.error(e);
                });
            });
        }
        });

</script>

<style>
    .underline{
        cursor: pointer;
    }
    .underline:hover{
        text-decoration: underline;
    }
</style>

@include('star-dash-partials.top-template')

    <div class="content-wrapper">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Username</th>
                    <th>Quotation Date</th>
                    <th>More</th>
                </thead>
                <tbody>
                    @if ($quotations)
                        @foreach ($quotations as $quotation)
                            <tr>
                                <td class="">{{$quotation->user->name}}</td>
                                <td class="">{{$quotation->Date_Quoted}}</td>
                                <td class="underline" data-bs-toggle="modal" data-bs-target="#quotationInfo"><button class="detail-click" data-id={{$quotation->id}}>View</button></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
@include('partials.quotation-items')
@include('star-dash-partials.bottom-template')
