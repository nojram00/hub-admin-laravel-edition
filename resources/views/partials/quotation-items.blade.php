<div class="modal fade" id="quotationInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-blue-400">
          <h1 class="modal-title fs-5 uppercase" id="processor_name">Quotation Info</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="processor-items" class="table">
                <thead>
                    <th class="">Item Name</th>
                    <th class="">Quantity</th>
                    <th class="">Category</th>
                    <th class="">Single Price</th>
                    <th class="">Bundle Price</th>
                    <th class="">Total Price</th>
                </thead>
                <tbody id='qi-body'>

                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <h1 id="total" class="m-3">Total: </h1>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>
