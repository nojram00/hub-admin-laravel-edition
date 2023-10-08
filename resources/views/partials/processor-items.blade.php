

{{-- Add form modal --}}
  <!-- Modal -->
  <div class="modal fade" id="processorInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-blue-400">
          <h1 class="modal-title fs-5 uppercase" id="processor_name">Processor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="processor-items" class="table">
                <thead>
                    <th scope="col" class="">Item Name</th>
                    <th scope="col" class="">Quantity</th>
                </thead>
                <tbody id='pi-body'>

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


{{-- <tbody id="pi-body">
    <tr>
        <td>Athlon 3000G</td>
        <td>20</td>
        <td>ryzen 5 5600</td>
        <td>10</td>
    </tr>
</tbody>

<tbody id="pi-body">
    <tr>
        <td>Athlon 3000G</td>
        <td>20</td>
    </tr>
    <tr>
        <td>ryzen 5 5600</td>
        <td>10</td>
    </tr>
</tbody> --}}
