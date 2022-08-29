<div class="py-5">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold blue-heading">
                    Let us hear from you directly!
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-muted mb-5">
                    Use this form to request a new component, submit your component ( provide github url ) or just say Hi !
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row justify-content-md-center">
                <div class="col-8">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div> <!-- /row>
            <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10">

                Form -->
                <form wire:submit.prevent="submit">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        <!-- Label -->
                        <label class="form-label" for="contactName">
                        Full name
                        </label>
                        <!-- Input -->
                        <input class="form-control @error('contactName') is-invalid @enderror" id="contactName" type="text" placeholder="Full name" wire:model.lazy="contactName">
                        @error('contactName')
                            <div id="invalidcontactNameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        <!-- Label -->
                        <label class="form-label" for="contactEmail">Email</label>
                        <!-- Input -->
                        <input class="form-control @error('contactEmail') is-invalid @enderror" id="contactEmail" type="email" placeholder="hello@domain.com" wire:model.lazy="contactEmail">
                        @error('contactEmail')
                            <div id="invalidcontactNameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                </div> <!-- / .row -->
                <div class="row">
                    <div class="col-12">
                    <div class="form-group mb-5">
                        <!-- Label -->
                        <label class="form-label" for="contactMessage">What can we help you with?</label>
                        <!-- Input -->
                        <textarea class="form-control @error('contactMessage') is-invalid @enderror" id="contactMessage" rows="5" placeholder="Tell us what we can help you with!" spellcheck="false" data-gramm="false" wire:model.lazy="contactMessage"></textarea>
                        @error('contactMessage')
                            <div id="invalidcontactNameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                </div> <!-- / .row -->
                <div class="row justify-content-center">
                    <div class="col-auto">
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary text-white lift">
                        Send message
                    </button>
                    </div>
                </div> <!-- / .row -->
                </form>

            </div>
            </div> <!-- / .row -->
    </div>
<div>
