<script type="text/javascript">
    function useState(initialValue){
           let currentValue = initialValue;

           function getValue(){
               return currentValue;
           }

           function setValue(value){
               currentValue = value;
           }
           return [getValue, setValue];
       }


       const [item, setItem] = useState([]);

       function InsertNewItem(items){
           var current = item();
           if(item === null){
               setItem(items);
           }else{
               var updated = [...current, items];
               setItem(updated);
           }

           console.log("items: ", item());

       }

       function displayModalData(itemData){
           setItem(itemData);

           // console.log(document.getElementsByTagName('itemContainer').innerHTML)

           var container = document.getElementById('modal-container');

           container.innerText = "hatdog";
           item().forEach((i) => {

               //create div card:
               var item_card = document.createElement('div');
               item_card.className = "card";

               //create a card body:
               var card_body = document.createElement('div');
               card_body.className = "card-body";
               item_card.appendChild(card_body);

               //card title:
               var card_title = document.createElement('h5');
               card_title.className = "card-title text-uppercase";
               card_title.innerText = i.item_name;
               card_body.appendChild(card_title);

               //add button:
               var button =  document.createElement('button');
               button.className = "btn btn-primary";
               button.addEventListener('click', function (){

                   var accordionContainer = document.getElementsByClassName('accordion-container');

                   var accordionArray = Array.from(accordionContainer)

                   accordionArray.forEach((a) => {
                       console.log("data ids: ",Number(a.getAttribute('data-id')));
                       if(Number(a.getAttribute('data-id')) === i.category_id){

                           //create row:
                           var row = document.createElement('div');
                           row.className = "row m-2";

                           //create column:
                           var col = document.createElement('div');
                           col.className = "col";
                           row.appendChild(col);

                           //create div card:
                           var item_card = document.createElement('div');
                           item_card.className = "card";
                           col.appendChild(item_card);

                           //create a card body:
                           var card_body = document.createElement('div');
                           card_body.className = "card-body";
                           item_card.appendChild(card_body);

                           //card title:
                           var card_title = document.createElement('h5');
                           card_title.className = "card-title text-uppercase";
                           card_title.innerText = i.item_name;
                           card_body.appendChild(card_title);

                           a.appendChild(row);
                       }

                   });

                    //returns null
                   // var updated = items.length == null ? i : [...items, i];
                   // setItem(updated);

                   console.log(item());

                   // console.log(accordionContainer);

                   // console.log(i.item_name);
                   // console.log(i.category_id);

               });
               button.innerText = "ADD";
               card_body.appendChild(button);

               container.appendChild(item_card);
               console.log(i);
           });
       }


   </script>


<div class="position-fixed p-5" style="transform: translateX(-50%); transform: translateY(20%); width: 100%;">
    {{-- Start Accordion --}}
    <div class="accordion" id="accordionExample">
        {{-- <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Accordion Item #1
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div> --}}

        @foreach ($categories as $category)
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{str_replace(' ', '', $category->category_name)}}"
                        aria-expanded="false"
                        aria-controls="{{str_replace(' ', '', $category->category_name)}}">
                    {{$category->category_name}}
                </button>
                </h2>
                <div id="{{str_replace(' ', '', $category->category_name)}}"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-column">
                        {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                        <div class="container accordion-container" data-id={{$category->id}}>
                            <div class="row">
                                <div class="col">
                                    <span name="{{$category->category_name}}" onclick="displayModalData({{$category->items}})" data-bs-toggle="modal" data-bs-target="#item-list" style="cursor: pointer;">Add</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        {{-- End Accordion --}}
      </div>
</div>


{{-- Modal --}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="item-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container" id="modal-container">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>
