<script type="text/javascript">
    function clear(){
            // clear all text:
            console.log("cleared")
            document.getElementById('item-name').innerText = "";
            document.getElementById('item-single').innerText =  "";
            document.getElementById('item-bundle').innerText=  "";
    }

    function deleteItem(){
        var itemId = document.getElementById('delete-btn').getAttribute('data-item-id');
        let res = confirm(`Are you sure you want to delete ${itemId}?`)

        if(res){
            fetch(`/deleteItem/${itemId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                },
            })
            .then((res) => res.json())
            .then((data) => console.log("data: ",data));
            alert('Item Deleted!');
            window.location.reload();
        }
    }
</script>


 <div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="item-name"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- Image --}}
            <img src="" width="244px" height="244px" class="" alt="" id="item-image">
            {{-- Details --}}
          <h6 class="text-2xl">Single Price: </h6><div id="item-single" class="text-2xl"></div>
          <h6 class="text-2xl">Bundle Price: </h6><div id="item-bundle" class="text-2xl"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="clear()" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="delete-btn" data-item-id="" onclick="deleteItem()">Delete</button>
        </div>
      </div>
    </div>
  </div>
