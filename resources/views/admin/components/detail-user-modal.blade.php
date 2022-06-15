<div class="modal fade" id="userDetailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="userDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h5 class="modal-title mb-2">Detail akun</h5>
        <button id="detailStatus" class="btn btn-sm px-4 text-capitalize" disabled>
          active
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <label for="mName">Nama</label>
          <input type="text" class="form-control" id="detailName" name="name" disabled>
        </div>

        <div class="form-group">
          <label for="mName">Username</label>
          <input type="text" class="form-control" id="detailUsername" name="username" disabled>
        </div>

        <div class="form-group">
          <label for="mRole">Role</label>
          <select class="form-control" id="detailRole" disabled>
            <option disabled>Pilih role</option>
            <option value="superadmin">Superadmin</option>
            <option value="admin">Admin</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#userDetailModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const user = JSON.parse(this.responseText)

      modal.find('.modal-body #detailName').val(user.name)
      modal.find('.modal-body #detailUsername').val(user.username)
      modal.find('.modal-body #detailRole').val(user.role)
      
      let status = modal.find('.modal-header #detailStatus')
      status.text(user.is_active ? 'active' : 'inactive')
      
      if (user.is_active) {
        status.removeClass('btn-warning')
        status.addClass('btn-success') 
      } else {
        status.removeClass('btn-danger') 
        status.addClass('btn-warning')
      }
         
    }
    xhttp.open('GET', '/admin/users/' + id)
    xhttp.send()
  })
</script>
@endpush