<!-- ======= Galeri Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Galeri</h2>
      <p>
        Dokumentasi kegiatan Dinas Pemberdayaan Perempuan Dan Perlindungan Anak, Pengendalian Penduduk Dan Keluarga
        Berencana
      </p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">Semua</li>
          <li data-filter=".filter-sosialisasi">Sosialisasi</li>
          <li data-filter=".filter-bansos">Bantuan Sosial</li>
          <li data-filter=".filter-masyarakat">Masyarakat</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      @foreach ($galleries as $gallery)

      <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $gallery->tag }}">
        <img src="{{ asset('storage/' . $gallery->url) }}" class="img-fluid" alt="gallery">
        <div class="portfolio-info">
          <p class="text-capitalize">{{ $gallery->tag }}</p>
          <a href="{{ asset('storage/' . $gallery->url) }}" data-gallery="portfolioGallery"
            class="portfolio-lightbox preview-link" title="{{ $gallery->description }}">
            <i class="bx bx-plus"></i>
          </a>
        </div>
      </div>

      @endforeach

    </div>

  </div>
</section><!-- End Galeri Section -->