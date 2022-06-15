<div class="modal fade" id="userUpdateModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h5 class="modal-title mb-2">Edit akun</h5>
        <button id="status" class="btn btn-sm px-4 text-capitalize" disabled>
          active
        </button>
      </div>

      <form action="" method="post" id="userUpdateForm" autocomplete="off">
        @method('put')
        @csrf

        <div class="modal-body">

          <div class="form-group">
            <label for="mName">Nama</label>
            <input type="text" class="form-control" id="mName" name="name" required>
          </div>

          <div class="form-group">
            <label for="mName">Username</label>
            <input type="text" class="form-control" id="mUsername" name="username" required>
          </div>

          <div class="form-group">
            <label for="mRole">Role</label>
            <select class="form-control" id="mRole" name="role" required>
              <option disabled>Pilih role</option>
              <option value="superadmin">Superadmin</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="form-group">
            <label for="mPassword">Password</label>
            <input type="password" class="form-control" id="mPassword" name="password" autocomplete="off">
            <small id="passwordHelp" class="form-text text-muted">
              Kosongkan jika tidak ingin mengganti password.
            </small>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">
            Update
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#userUpdateModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const user = JSON.parse(this.responseText)

      modal.find('#userUpdateForm').attr('action', '/admin/users/' + id)

      modal.find('.modal-body #mName').val(user.name)
      modal.find('.modal-body #mUsername').val(user.username)
      modal.find('.modal-body #mRole').val(user.role)
      modal.find('.modal-body #mPassword').val('')
      
      
      let status = modal.find('.modal-header #status')
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