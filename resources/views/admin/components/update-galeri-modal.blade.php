<!-- update Gallery Modal -->
<div class="modal fade" id="updateGaleriModal" tabindex="-1" aria-labelledby="updateGaleriModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateGaleriModalLabel">Update Galeri Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/admin/galleries" method="post" enctype="multipart/form-data" id="updateGalleryForm">
        @method('patch')
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="gallery">Pilih gambar</label>
            <img class="img-fluid gal-preview-update mb-3">
            <input type="file" id="galleryUpdate" name="gallery" onchange="previewGalleryUpdate()"
              class="form-control-file">

            @if($errors->any())

            @error('gallery')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror

            @endif

          </div>

          <div class="form-group">
            <label for="imgDesc">Deskripsi Gambar</label>
            <textarea class="form-control" name="description" id="uImgDesc" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label for="tag">Tag</label>
            <select class="form-control" id="uTag" name="tag" required>
              <option selected disabled>Pilih tag</option>
              <option value="sosialisasi">Sosialisasi</option>
              <option value="bansos">Bantuan Sosial</option>
              <option value="masyarakat">Masyarakat</option>
            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>

@push('scripts')
<script>
  // Preview Gallery

  function previewGalleryUpdate() {
    const image = document.querySelector('#galleryUpdate')
    const imgPreview = document.querySelector('.gal-preview-update')

    imgPreview.style.display = 'block'
    imgPreview.style.maxHeight = '300px'
    
    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result
    }
  }
</script>

<script>
  $('#updateGaleriModal').on('show.bs.modal', function (e) {
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const imgPreview = document.querySelector('.gal-preview-update')
      
    let selectTagOnly = document.querySelector('#uTag')
    let selectTag = document.querySelectorAll('#uTag')
    let options = [...selectTag[0].options].map(option => option.value)

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const gallery = JSON.parse(this.responseText)

      modal.find('#updateGalleryForm').attr('action', '/admin/galleries/' + gallery.id)

      modal.find('.modal-body #uImgDesc').val(gallery.description)
      imgPreview.src = '/storage/' + gallery.url
      
      options.forEach(option => {
        if (option == gallery.tag) {
          selectTagOnly.value = option
        }
      })
    }

    xhttp.open('GET', '/admin/galleries/' + id)
    xhttp.send()
  })
</script>
@endpush