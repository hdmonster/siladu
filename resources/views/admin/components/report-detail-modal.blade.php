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

                    {{-- <li class="timeline-item period">
                      <div class="timeline-info"></div>
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <h5 class="timeline-title">History Status Laporan</h5>
                      </div>
                    </li> --}}
                    <li class="timeline-item">
                      <div class="timeline-info">
                        <span>April 28, 2016</span>
                      </div>
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <h5 class="timeline-title">Laporan dikirim</h5>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quia odit similique officiis
                          architecto, eum eligendi quibusdam ad nisi reprehenderit.
                        </p>
                      </div>
                    </li>

                    <li class="timeline-item">
                      <div class="timeline-info">
                        <span>May 02, 2022</span>
                      </div>
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <h5 class="timeline-title">Laporan dikonfirmasi</h5>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, accusamus?
                        </p>
                      </div>
                    </li>

                    <li class="timeline-item">
                      <div class="timeline-info">
                        <span>May 03, 2022</span>
                      </div>
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <h5 class="timeline-title">Kasus dalam penanganan</h5>
                        <p>
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat blanditiis eveniet
                          doloremque?
                        </p>
                      </div>
                    </li>

                    <li class="timeline-item">
                      <div class="timeline-info">
                        <span>May 23, 2022</span>
                      </div>
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <h5 class="timeline-title">Kasus Ditutup</h5>
                        <p>
                          Nullam vel sem. Nullam vel sem. Integer ante arcu, accumsan a, consectetuer eget, posuere ut,
                          mauris.
                        </p>
                      </div>
                    </li>

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
  $('#detailModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const report = JSON.parse(this.responseText)

      modal.find('.modal-header #nama').text(`Dilaporkan oleh ${report.nama} (${report.umur} th)`)
      modal.find('.modal-header #pelapor_info #no_hp').text(report.no_hp)
      modal.find('.modal-body #pelapor_detail #alamat').text(report.alamat)
      modal.find('.modal-body #pelapor_detail #nama_ortu').text(report.nama_ortu)
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
         
    }
    xhttp.open('GET', '/admin/reports/' + id)
    xhttp.send()
  })
</script>
@endpush