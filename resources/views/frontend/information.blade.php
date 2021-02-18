@extends('frontend.template.home')

@section('content')

<main id="main">
    <!-- ======= News Section ======= -->
    <section id="news" class="news bg-light">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Berita Terbaru</h2>
        </div>
        <div class="row"style="flex-wrap: wrap; justify-content: space-between">
            @foreach ($news as $item)
            <div class="card mb-5" style="width: 22rem;">
                <img class="card-img-top" src="{{ url($item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text news-description">{{ $item->description }}</p>
                    <a href="/detail-news/{{ $item->id }}" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </section><!-- End News Section -->
</main>

@endsection