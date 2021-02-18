@extends('frontend.template.home')

@section('content')

<main id="main">

    <!-- ======= Facilities Section ======= -->
    <section id="about" class="about bg-light">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>FASILITAS KAMI</h2>
        </div>

        @foreach ($facilities as $item)
        <div class="row align-items-center mb-5">
            <div class="col-lg-4">
                <img src="{{ url($item->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content">
                <h4>{{ $item->title }}</h4>
                <p>
                    {{ $item->description}}
                </p>
                <a href="/" class="btn btn-info">Read More</a>
            </div>
        </div>
        @endforeach
      </div>
    </section><!-- End About Section -->
</main>


@endsection