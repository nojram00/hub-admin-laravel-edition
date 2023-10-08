<script type="text/javascript">
    function useState(initialValue){
            let _initial = initialValue;

            function getValue(){
                return _initial
            }
            function setValue(value){
                _initial = value;
            }

            return [getValue, setValue];
        }

        function InsertData(itemName){
            const [name, setName] = useState('');
            console.log("first: ", name());
            setName(itemName);
            console.log("next: ", name());

            document.getElementById('item-name').innerHTML =`<h5 class="text-uppercase">${name().item_name}</h5>` ;
        }

</script>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light text-uppercase">{{$products}}</h1>
        <p class="lead text-muted">Check our available products</p>
        {{-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p> --}}
      </div>
    </div>
  </section>

<div class="album py-5 bg-light">
    <div class="container">


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach ($productList as $productItem)
                {{-- Item Start --}}
                <div class="col">
                    {{-- card start --}}
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p class="card-text">{{$productItem->item_name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#details" onclick="InsertData({{$productItem}})">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart</button>
                                </div>
                            <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                    {{-- card end --}}
                </div>
            @endforeach

            {{-- item end --}}
        </div>
    </div>
</div>

{{-- Modal --}}

<div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="item-name"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="delete-btn" data-item-id="" onclick="">Add To Cart</button>
        </div>
      </div>
    </div>
  </div>


