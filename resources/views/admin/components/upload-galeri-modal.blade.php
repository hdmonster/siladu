<!-- Upload Gallery Modal -->
<div class="modal fade" id="uploadGaleriModal" tabindex="-1" aria-labelledby="uploadGaleriModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadGaleriModalLabel">Upload Galeri Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/admin/galleries" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="gallery">Pilih gambar</label>
            <img class="img-fluid gal-preview mb-3">
            <input type="file" id="gallery" name="gallery" onchange="previewGallery()" class="form-control-file">

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
            <textarea class="form-control" name="description" id="imgDesc" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="tag">Tag</label>
            <select class="form-control" id="tag" name="tag">
              <option selected disabled>Pilih tag</option>
              <option value="sosialisasi">Sosialisasi</option>
              <option value="bantuan sosial">Bantuan Sosial</option>
              <option value="masyarakat">Masyarakat</option>
            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>

      </form>

    </div>
  </div>
</div>

@push('scripts')
<script>
  // Preview Gallery

  function previewGallery() {
    const image = document.querySelector('#gallery')
    const imgPreview = document.querySelector('.gal-preview')

    imgPreview.style.display = 'block'
    imgPreview.style.maxHeight = '300px'
    
    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result
    }
  }
</script>
@endpush