<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="d-flex flex-column align-items-center py-4 px-2 text-center">
          <h4 class="mb-3">Laporan Telah Terkirim</h4>

          <div id="icon-container" style="max-width: 50%"></div>

          <span class="mb-3">
            Tim kami akan memeriksa laporan pengaduan anda dalam 2-3 hari kerja.
            Status laporan anda dapat dicek menggunakan kode
            <b>
              <span id="reportCode"></span>
            </b>
          </span>

          <span class="mb-2">
            Siapkan berkas-berkas berikut:
            <span id="filesToPrepare"></span>
          </span>

          <button type="button" class="btn btn-secondary mt-5 px-5" data-bs-dismiss="modal">
            Selesai
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@push('scripts')
<script>
  var animation = bodymovin.loadAnimation({
    // animationData: {  },
    container: document.querySelector('#icon-container'),
    path: 'https://assets9.lottiefiles.com/packages/lf20_pqnfmone.json',
    renderer: 'svg',
    loop: false,
    autoplay: true, 
    name: "Success Animation", 
  });

  document.querySelector('#successModal').addEventListener('show.bs.modal', function(e){
    filesPerempuan = ['KTP', 'Kartu Keluarga', 'BPJS']
    filesAnak = ['Akte Kelahiran', 'Kartu Keluarga', 'BPJS']

    let report = e.relatedTarget

    let reportCode = document.querySelector('#successModal #reportCode')
    let filesToPrepare = document.querySelector('#successModal #filesToPrepare')
    filesToPrepare.innerHTML = ''
    
    reportCode.innerHTML = report.code
    
    if (report.jenis_laporan == 'perempuan') {
      filesPerempuan.forEach(file => filesToPrepare.innerHTML += `<br> - ${file}`);
    } else {
      filesAnak.forEach(file => filesToPrepare.innerHTML += `<br> - ${file}`);
    }
  })
</script>
@endpush