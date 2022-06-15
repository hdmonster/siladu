<div class="modal fade" id="detailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header d-flex flex-column">
        <h5 class="modal-title mb-2" id="nama">Dilaporkan oleh</h5>
        <div class="d-flex align-items-center justify-content-between" style="width: 100%" id="pelapor_info">
          <div class="d-flex align-items-center justify-items-center">
            <i class="fa fa-phone-alt"></i>
            <span class="ml-2" id="no_hp"></span>
          </div>
          <button id="jenis_laporan" class="btn btn-sm px-4 text-capitalize" disabled>
            jenis laporan
          </button>
        </div>
      </div>
      <div class="modal-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
              aria-controls="nav-info" aria-selected="true">Information</a>
            <a class="nav-link" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab"
              aria-controls="nav-history" aria-selected="false">History</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">

            <div class="container-fluid mt-2 p-0" id="pelapor_detail">
              <div class="d-flex flex-column mb-4">
                <small class="font-weight-bold">Nama Korban</small>
                <span id="nama_korban"></span>
              </div>

              <div class="d-flex flex-column mb-4">
                <small class="font-weight-bold">Umur</small>
                <span id="umur"></span>
              </div>

              <div class="d-flex flex-column mb-4">
                <small class="font-weight-bold">Nama Ortu</small>
                <span id="nama_ortu"></span>
              </div>

              <div class="d-flex flex-column mb-4">
                <small class="font-weight-bold">Alamat</small>
                <span id="alamat"></span>
              </div>

              <div class="d-flex flex-column">
                <small class="font-weight-bold">Kronologi Kejadian</small>
                <span id="kronologis"></span>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">

            <div class="container-fluid p-0">

              <div class="row example-basic mt-2">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                  <ul class="timeline">
                  </ul>
                </div>
              </div>

            </div>

          </div>
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
  $('#detailModal').on('show.bs.modal', function (e) {
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const timelineContainer = document.querySelector('ul.timeline')
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const report = JSON.parse(this.responseText)

      modal.find('.modal-header #nama').text(`Dilaporkan oleh ${report.nama_pelapor}`)
      modal.find('.modal-header #pelapor_info #no_hp').text(report.no_hp)
      modal.find('.modal-body #pelapor_detail #nama_korban').text(report.nama)
      modal.find('.modal-body #pelapor_detail #umur').text(report.umur)
      modal.find('.modal-body #pelapor_detail #nama_ortu').text(report.nama_ortu)
      modal.find('.modal-body #pelapor_detail #alamat').text(report.alamat)
      modal.find('.modal-body #pelapor_detail #kronologis').text(report.kronologis)
      
      let jenisLaporan = modal.find('.modal-header #pelapor_info #jenis_laporan')
      jenisLaporan.text(report.jenis_laporan)
      
      if (report.jenis_laporan == 'anak') {
        jenisLaporan.removeClass('btn-warning')
        jenisLaporan.addClass('btn-danger') 
      } else {
        jenisLaporan.removeClass('btn-danger') 
        jenisLaporan.addClass('btn-warning')
      }

      let reportStatusHistories = report.report_status_histories

      let timelineItems = `
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

      timelineContainer.innerHTML = timelineItems
    }
    xhttp.open('GET', '/admin/reports/' + id)
    xhttp.send()
  })

  $('#detailModal').on('hidden.bs.modal', function (e) {
    const timelineContainer = document.querySelector('ul.timeline')
    timelineContainer.innerHTML = ''
  })
</script>
@endpush