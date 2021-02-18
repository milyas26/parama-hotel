@extends('frontend.template.home')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
        <h1 style="max-width: 600px; text-align: center; text-transform: uppercase">{{ $header->main_title }}</h1>
        <h2>{{ $header->second_title }}</h2>
        <a href="/contact-us" class="btn-about">Get Started</a>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan Kami</h2>
        </div>

        <div class="row">
            @foreach ($service as $item)
                
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <h4><a href="">{{ $item->title }}</a></h4>
              <p>{{ $item->description }}</p>
            </div>
          </div>
          @endforeach
        </div>
        
    </div>
    </section><!-- End Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about bg-light">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row align-items-center">
          <div class="col-lg-4">
            <img src="{{ url($about->image) }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
              <h4>Apartemen Parama</h4>
            <p class="deskripsi-index">
              {{ $about->description}}
            </p>
            <a href="/about" class="btn btn-info">Read More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    
    <!-- ======= Fasilitas Section ======= -->
    <section id="facilities" class="facilities">
      <div class="container" data-aos="fade-up">
          <div class="row align-items-center mb-5">
              <div class="col-lg-8 pt-4 pt-lg-0 content">
                  <h4>{{ $info[0]->title }}</h4>
                  <p>
                    {{ $info[0]->description}}
                  </p>
                  <a href="/units" class="btn btn-outline-info">Read More</a>
              </div>
              <div class="col-lg-4">
                <img src="{{ url($info[0]->image) }}" class="img-fluid" alt="">
              </div>
          </div>

          <div class="row align-items-center">
              <div class="col-lg-8 pt-4 pt-lg-0 content">
                  <h4>{{ $info[1]->title }}</h4>
                  <p>
                    {{ $info[1]->description}}
                  </p>
                  <a href="/facilities" class="btn btn-outline-info">Read More</a>
              </div>
              <div class="col-lg-4">
                <img src="{{ url($info[1]->image) }}" class="img-fluid" alt="">
              </div>
          </div>
      </div>
    </section><!-- End Facilities Section -->

    <!-- ======= News Section ======= -->
    <section id="news" class="news bg-light">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Berita Terbaru</h2>
        </div>
        <div class="row"style="flex-wrap: wrap; justify-content: space-between">
            @foreach ($news as $item)
            <div class="card mb-3" style="width: 22rem;">
                <img class="card-img-top" src="{{ url($item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text news-description">{{ $item->description }}</p>
                    <a href="/detail-news/{{ $item->id }}" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="view-more mt-5" style="text-align: center">
            <a href="/information" class="btn btn-outline-info btn-lg">Lihat Lebih Banyak</a>
        </div>
      </div>
    </section><!-- End News Section -->

@endsection