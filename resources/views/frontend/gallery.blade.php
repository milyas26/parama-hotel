@extends('frontend.template.home')

@section('content')

<main id="main">
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="news bg-light">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>GALLERY</h2>
        </div>
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($gallery as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ $item->image }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <div class="portfolio-links">
                    <a href="{{ $item->image }}" data-gall="portfolioGallery" class="venobox"><i class="bx bx-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="news bg-light">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>VIDEOS</h2>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($youtube as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ $item->url_thumbnail }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <div class="portfolio-links">
                    <a href="/gallery-detail/{{ $item->id }}" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
    </section><!-- End Gallery Section -->
</main>

@endsection