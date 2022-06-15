<!-- ======= Call To Action Section ======= -->
<section id="call-to-action">
  <div class="container" data-aos="zoom-out">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3 class="cta-title">Lacak Status Aduan</h3>
        <p class="cta-text">
          Sebelumnya udah pernah buat laporan kasus? Coba lacak status laporan anda!
        </p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <form id="formTrack">
          <div class="d-flex">
            <div class="form-group mt-3">
              <input type="text" class="form-control" id="reportCode" placeholder="Kode Aduan" required>
            </div>
            <button type="submit" style="background: #081e5b" class="cta-btn align-middle" id="btnTrack">
              Lacak
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
  const formTrack = document.querySelector('#formTrack')
  const btnTrack = document.querySelector('#btnTrack')

  let trackStatusModal = new bootstrap.Modal(document.querySelector('#trackStatusModal'), {
    keyboard: false
  })

  formTrack.addEventListener('submit', async event => {
    event.preventDefault()
    disabledBtnTrack(true)

    let code = document.querySelector('#reportCode').value

    let report = await getReportDetail(code)
    disabledBtnTrack(false)
    formTrack.reset()

    console.log(report)

    report == '' ? 
    window.alert('Laporan tidak ditemukan!')
    :
    trackStatusModal.show(report)
  })

  const disabledBtnTrack = (state) => btnTrack.disabled = state 

  const getReportDetail = async code => {
    try {
      const res = await axios.get('/api/admin/reports/code/' + code)
      
      return res.data
    } catch (e) {
      console.log('Cannot get report:', e)
    }
  }
</script>
@endpush