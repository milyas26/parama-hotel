@extends('frontend.template.home')

@section('content')

    <main id="main">
    <section id="news" class="news">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{ $news->title }}</h2>
        </div>
        <div class="row">
            <div class="col-8">
                <img src="{{ url($news->image) }}" alt="image" style="max-width: 100%;">
                <p class="mt-4" style="text-align: justify">{{ $news->description }}</p>
            </div>
            <div class="col-4">
                <h4>Berita Terbaru</h4>
                <div class="row ml-1">
                    @foreach ($allNews as $item)
                    <div class="row mb-4" onclick="window.location='/detail-news/{{ $item->id }}'" style="cursor: pointer">
                        <div class="col-4">
                            <img src="{{ url($item->image) }}" alt="thumbnail" style="max-width: 100%">
                        </div>
                        <div class="col-8">
                            <h6>{{ $item->title }}</h6>
                            <span style="font-size: 12px">Published {{ $item->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </section><!-- End News Section -->
    </main>

@endsection