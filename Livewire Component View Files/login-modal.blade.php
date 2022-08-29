
<div>
    <div class="modal" id="loginModal" tabindex="-1" wire:key="login-model" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="login">
            @guest
            <div class="modal-body">
                @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                @endif  
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Email address</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleFormControlInput1" name="username" placeholder="Your Email" wire:model.lazy="username">
                    @error('username')
                        <div id="invalidEmailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your password" wire:model.lazy="password">
                    @error('password')
                        <div id="invalidEmailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @else
            <div class="modal-body">
                <div class="alert alert-success">
                    You are already logged into the application.
                </div>
            </div>
            @endguest
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @guest
                    <button type="submit" class="btn btn-primary text-white">Login</button>
                @else
                    <button class="btn bg-gray-200" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    Log Out
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                @endguest
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
