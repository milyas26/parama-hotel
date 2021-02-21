@extends('frontend.template.home')

@section('content')

    <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>UNITS</h2>
          <p>DAFTAR UNIT YANG TERSEDIA</p>
        </div>

        <div class="card">
            <div class="card-header">
              <h4>UNITS LANTAI 1 - 16</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitAB->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitAB->title }}</h5>
                    <div>{{ $unitAB->description }}</div>
                  </div>
                </li>
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitCD->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitCD->title }}</h5>
                    <div>{{ $unitCD->description }}</div>
                  </div>
                </li>
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitEF->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitEF->title }}</h5>
                    <div>{{ $unitEF->description }}</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        <div class="card mt-5">
            <div class="card-header">
              <h4>UNITS LANTAI 17 - 18</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitA->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitA->title }}</h5>
                    <div>{{ $unitA->description }}</div>
                  </div>
                </li>
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitB->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitB->title }}</h5>
                    <div>{{ $unitB->description }}</div>
                  </div>
                </li>
                <li class="media mb-4">
                  <img class="mr-3" src="{{ url($unitC->image) }}" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $unitC->title }}</h5>
                    <div>{{ $unitC->description }}</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
@endsection