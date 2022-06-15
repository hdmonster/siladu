<div class="modal fade" id="formPengaduanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form class="overflow-auto" autocomplete="off" id="formReport">
        @csrf

        <div class="modal-body">
          <input type="hidden" name="report_type" id="reportType">

          <div class="row mb-3">
            <div class="col">
              <label for="reporterNameInput" class="form-label">Nama Pelapor</label>
              <input type="text" class="form-control" id="reporterNameInput" required>
            </div>

            <div class="col">
              <label for="reporterMobile" class="form-label">No HP</label>
              <input type="tel" onkeypress="return onlyNumberKey(event)" class="form-control" id="reporterMobileInput"
                required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="victimNameInput" class="form-label">Nama Korban</label>
              <input type="text" class="form-control" id="victimNameInput" required>
            </div>

            <div class="col-md-2">
              <label for="victimAgeInput" class="form-label">Umur</label>
              <input type="number" class="form-control" id="victimAgeInput" required>
            </div>

            <div class="col">
              <label for="victimParentName" class="form-label">Nama ortu</label>
              <input type="text" class="form-control" id="victimParentInput" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="victimAddressInput" class="form-label">Alamat</label>
            <textarea class="form-control" id="victimAddressInput" rows="3" required></textarea>
            <div id="victimAddressInputInputHelp" class="form-text">
              *Alamat korban saat ini
            </div>
          </div>

          <div class="mb-3">
            <label for="victimChronologicalInput" class="form-label">Kronologis</label>
            <textarea class="form-control" id="victimChronologicalInput" rows="6" required></textarea>
            <div id="victimChronologicalInputHelp" class="form-text">
              Bantu kami dalam memahami kejadian yang dialami korban secara jelas
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Tutup
          </button>
          <button type="submit" class="btn btn-primary" id="btnKirim">
            Kirim
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

@push('scripts')
<script>
  const formPengaduanModal = document.querySelector('#formPengaduanModal')
  formPengaduanModal.addEventListener('show.bs.modal', function(e) {
    let button = e.relatedTarget
    let jenis_laporan = button.getAttribute('data-bs-jenis_laporan')

    formPengaduanModal.querySelector('.modal-title').innerHTML = 'Laporkan kasus kekerasan ' + jenis_laporan

    formPengaduanModal.querySelector('#reportType').value = jenis_laporan
  })

  function onlyNumberKey(e) {
          
    // Only ASCII character in that range allowed
    var ASCIICode = (e.which) ? e.which : e.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        
    return true;
  }
</script>

<script>
  const btnKirim = document.querySelector('#btnKirim')
  const form = document.querySelector('#formReport');

  let formModal = new bootstrap.Modal(document.querySelector('#formPengaduanModal'), {
    keyboard: false
  })
  let successModal = new bootstrap.Modal(document.querySelector('#successModal'), {
    keyboard: false
  })

  form.addEventListener('submit', async event => {
    event.preventDefault()

    disableBtnSubmit(true)

    const code = Math.floor(Math.random() * 1000000)

    const nama_pelapor = document.querySelector('#reporterNameInput').value
    const no_hp = document.querySelector('#reporterMobileInput').value
    const nama = document.querySelector('#victimNameInput').value
    const umur = document.querySelector('#victimAgeInput').value
    const nama_ortu = document.querySelector('#victimParentInput').value
    const alamat = document.querySelector('#victimAddressInput').value
    const kronologis  = document.querySelector('#victimChronologicalInput').value
    const jenis_laporan  = document.querySelector('#reportType').value
    
    const report = {
      code,
      nama_pelapor,
      no_hp,
      nama,
      umur,
      nama_ortu,
      alamat,
      kronologis,
      jenis_laporan
    }

    let getReport = await submitReport(report)
    disableBtnSubmit(false)
    form.reset()
    formModal.hide()
    successModal.show(getReport)
  })

  const disableBtnSubmit = (state) => btnKirim.disabled = state 

  const submitReport = async report => {
    try {
      const res = await axios.post('/api/admin/reports', report)
      const reportCode = res.data

      console.log('report submitted')

      return reportCode
    } catch (e) {
      console.log('Cannot submit report:', e)
    }
  }
</script>
@endpush