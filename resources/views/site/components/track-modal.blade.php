<div class="modal fade" id="trackStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="d-flex flex-column py-4 px-2">
          <h4 class="align-self-center mb-4">Detail Laporan Pengaduan</h4>

          <div id="infoLaporan"></div>

          <div class="container-fluid p-0">
            <div class="row example-basic mt-2">
              <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <ul class="timeline"></ul>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-secondary mt-5 px-5" data-bs-dismiss="modal">
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@push('scripts')
<script>
  const infoLaporanItem = ({nama_pelapor, no_hp, nama, umur, nama_ortu, alamat}) => `
  <pre class="m-0 fs-6">
Pelapor: ${nama_pelapor}
No HP: ${no_hp}
Nama Korban: ${nama}
Umur: ${umur}
Nama Orangtua: ${nama_ortu}
Alamat: ${alamat}
  </pre>`

  const timelineItem = (title, datetime) => {
    let parsedDatetime = new Date(datetime).toLocaleString();

    if (title == 'sedang diproses') {
      title = 'Laporan telah dikonfirmasi'
    } else if (title == 'selesai') {
      title = 'Kasus ditutup'
    } else if (title == 'spam') {
      title = 'Laporan dianggap tidak valid'
    } else if (title == 'butuh konfirmasi') {
      title = 'Laporan dianggap valid dan menunggu dikonfirmasi'
    }

    return `<li class="timeline-item">
              <div class="timeline-info">
                <span>${parsedDatetime}</span>
              </div>
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <h6 class="timeline-title">${title}</h6>
              </div>
            </li>`
  }
</script>

<script>
  document.querySelector('#trackStatusModal').addEventListener('show.bs.modal', function(e) {
    let report = e.relatedTarget

    const timelineContainer = document.querySelector('ul.timeline')
    const infoLaporanContainer = document.querySelector('div#infoLaporan')

    let reportStatusHistories = report.report_status_histories

    let timelineItems = `
      <li class="timeline-item period">
        <div class="timeline-info"></div>
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <h5 class="timeline-title">History Status Laporan</h5>
        </div>
      </li>
      <li class="timeline-item">
        <div class="timeline-info">
          <span>${new Date(report.created_at).toLocaleString()}</span>
        </div>
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <h6 class="timeline-title">Laporan dikirim</h6>
        </div>
      </li>`

    reportStatusHistories.forEach(history => {
      timelineItems += timelineItem(history.status, history.created_at)
    })

    infoLaporanContainer.innerHTML = infoLaporanItem(report)
    timelineContainer.innerHTML = timelineItems

  })
</script>
@endpush