@extends('frontend.template.home')

@section('content')

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Apartemen Parama</h2>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <img src="{{ url($about->image) }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <p style="text-align: justify">
              {{ $about->description}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services bg-light">
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

    <!-- ======= Youtube Section ======= -->
    <section id="facilities" class="facilities">
      <div class="container" data-aos="fade-up"> 
        <h2>Profile</h2>
            <div class="row">
                <div class="col-xl-12 text-center wow bounceInRight order-md-last order-xl-last">
                    @if ($youtube != '')
                    <iframe width="100%" height="600px" src="https://www.youtube.com/embed/YLyI4pfSuvc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        
                    @endif
                </div>
            </div>
      </div>
    </section><!-- End Youtube Section -->

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

</main>
@endsection