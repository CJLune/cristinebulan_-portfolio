  <section id="contact" class="section">
        <div class="container">
            <div class="section-title"><span class="bar"></span><h2 class="mb-0">Let’s Talk</h2></div>
            <p class="lead">I'm ready to bring my integrated skill set in web development and technical SEO to a forward-thinking team. If you're looking for a passionate developer focused on performance and growth, let's connect.</p>
            <div class="row g-4 mt-4">
                <div class="col-lg-8">
                    <div class="card p-4 p-md-5">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3"><label for="name" class="form-label">Full Name</label><input type="text" class="form-control" id="name" name="name" required></div>
                            <div class="mb-3"><label for="email" class="form-label">Email Address</label><input type="email" class="form-control" id="email" name="email" required></div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3"><label for="message" class="form-label">Message</label><textarea class="form-control" id="message" name="message" rows="5" required placeholder="How can I help your team? Tell me about the role or project..."></textarea></div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-4">
                        <h5 class="mb-3">Contact Details</h5>
                        <ul class="contact-links">
                            <li>
                                <a href="mailto:cristinejoybulan@gmail.com" aria-label="Email me">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width: 24px; height: 24px;"><path d="M1.5 2.5A1.5 1.5 0 0 0 0 4v16a1.5 1.5 0 0 0 1.5 1.5h21A1.5 1.5 0 0 0 24 20V4a1.5 1.5 0 0 0-1.5-1.5zM21.084 5.5l-8.31 6.13a1.5 1.5 0 0 1-1.548 0L2.916 5.5zM22.5 19.5H1.5V6.735l9.406 6.94a3 3 0 0 0 3.188 0L22.5 6.735z"/></svg>
                                    <span>cristinejoybulan@gmail.com</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+491234567890" aria-label="Call me">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width: 24px; height: 24px;"><path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.279-.087.431l4.258 7.373c.077.152.25.18.431.087l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" /></svg>
                                    <span>+49 173 171 0099</span>
                                </a>
                            </li>
                        </ul>
    
                        <h5 class="mt-4">Location</h5>
                        <p class="mb-0">Bremen, Germany</p>
                        <p class="small text-muted mb-0">Online & accepting remote work globally.</p>
    
                        <h5 class="mt-4">Connect</h5>
                        <ul class="contact-links pt-1">
                            <li>
                                <a href="#" aria-label="Visit my LinkedIn profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width: 24px; height: 24px;"><path d="M2.5 2h-17A1.5 1.5 0 0 0 2 3.5v17A1.5 1.5 0 0 0 3.5 22h17a1.5 1.5 0 0 0 1.5-1.5v-17A1.5 1.5 0 0 0 20.5 2zM8 19H5V8h3zm-1.5-12.25A1.25 1.25 0 1 1 5.25 5.5 1.25 1.25 0 0 1 6.5 6.75zM19 19h-3v-5.09c0-1.22-.02-2.79-1.7-2.79s-1.96 1.32-1.96 2.7v5.18h-3V8h2.88v1.32h.04c.4-.76 1.38-1.56 2.84-1.56C18.1 7.76 19 9.38 19 11.62z"/></svg>
                                    <span>LinkedIn</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="Visit my GitHub profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width: 24px; height: 24px;"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.166 6.839 9.489.5.09.682-.218.682-.482 0-.237-.009-.866-.014-1.7-2.782.603-3.37-1.341-3.37-1.341-.455-1.156-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608 1.004.07 1.532 1.03 1.532 1.03.89 1.528 2.336 1.087 2.906.832.09-.647.348-1.087.634-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.03-2.682-.103-.253-.447-1.27.097-2.64 0 0 .84-.269 2.75 1.026A9.628 9.628 0 0 1 12 6.819c.85.004 1.705.114 2.5.335 1.91-1.295 2.75-1.026 2.75-1.026.546 1.37.202 2.387.1 2.64.64.7 1.026 1.59 1.026 2.682 0 3.842-2.338 4.685-4.566 4.934.358.308.678.92.678 1.852 0 1.338-.012 2.418-.012 2.746 0 .266.18.576.688.48A10.001 10.001 0 0 0 22 12c0-5.523-4.477-10-10-10Z"/></svg>
                                    <span>GitHub</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>