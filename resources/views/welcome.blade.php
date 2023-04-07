<x-main>

    <header class="bg-dark bg-gradient py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">A Bootstrap template for modern businesses</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">A better way to start building.</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"Working with Start Bootstrap templates has saved me tons of development time when building new projects! Starting with a Bootstrap template just makes things easier!"</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                            <div class="fw-bold">
                                Tom Ato
                                <span class="fw-bold text-primary mx-1">/</span>
                                CEO, Pomodoro
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Main news</h2>
                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @foreach ($articles as $article)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="{{Storage::url($article->image)}}" alt="..." />
                        <div class="card-body p-4">
                            @foreach ($article->categories as $category)
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$category->name}}</div>
                            @endforeach
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">{{$article['title']}}</h5></a>
                            <p class="card-text mb-0">{{$article['description']}}</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">{{$article['author']}}</div>
                                        <div class="text-muted">{{$article['updated_at']}} {{rand($min=2, $max=12)}} min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
           
            <!-- Call to action-->
            <aside class="bg-success bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                        <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                        </div>
                        <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    </main>

</x-main>