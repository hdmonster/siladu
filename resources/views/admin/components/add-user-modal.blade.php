<div class="modal fade" id="addUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h5 class="modal-title mb-2">Tambah akun admin</h5>
      </div>

      <form action="/admin/users" method="post" autocomplete="off">
        @csrf

        <div class="modal-body">

          <div class="form-group">
            <label for="addName">Nama</label>
            <input type="text" class="form-control" id="addName" name="name">
          </div>

          <div class="form-group">
            <label for="addUsername">Username</label>
            <input type="text" class="form-control" id="addUsername" name="username">
          </div>

          <div class="form-group">
            <label for="addRole">Role</label>
            <select class="form-control" id="addRole" name="role">
              <option selected disabled>Pilih role</option>
              <option value="superadmin">Superadmin</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="form-group">
            <label for="mPassword">Password</label>
            <input type="password" class="form-control" id="mPassword" name="password" />
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Add
          </button>
        </div>

      </form>
    </div>
  </div>
</div>