    <section id="work" class="section" style="background-color: color-mix(in oklab, var(--bg) 50%, var(--line));">
        <div class="container">
            <div class="section-title"><span class="bar"></span><h2 class="mb-0">Selected Projects</h2></div>
            <p class="lead">A collection of case studies demonstrating how I solve business problems through web development and technical SEO. More detailed write-ups are coming soon.</p>
            <div class="row g-4 mt-4">
                @forelse ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-2 h-100">
                            <img class="card-img-top rounded" src="{{ $project->image_path ?? '#' }}" alt="{{ $project->title }}">
                            <div class="card-body d-flex flex-column">
                                <div class="eyebrow mb-1">{{ $project->technologies }}</div>
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->description }}</p>
                                <div class="text-center mt-auto pt-3">
                                    <a href="#contact" class="btn btn-sm btn-primary">Ask About This Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col"><p>No projects to display yet.</p></div>
                @endforelse
            </div>
        </div>
    </section>