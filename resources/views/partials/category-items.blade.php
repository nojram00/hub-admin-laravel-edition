<div class="modal fade" id="categoryItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-blue-400">
          <h1 class="modal-title fs-5 uppercase" id="category-name"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="category-items" class="table">
                <thead>
                    <th scope="col" class="">Item Name</th>
                    <th scope="col" class="">Quantity</th>
                </thead>
                <tbody id='ci-body'>

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>
