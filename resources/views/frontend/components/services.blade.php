<!-- Services -->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">Our Services</h3>
        </div>
        <div class="row text-center">
            @foreach($services as $service)
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}" class="fa-stack-1x fa-inverse" style="width: 50px; height: 50px;">
                    </span>
                    <h4 class="my-3">{{ $service->title }}</h4>
                    <p class="text-muted">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
