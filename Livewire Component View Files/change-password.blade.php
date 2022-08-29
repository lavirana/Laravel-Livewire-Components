<div class="card card-bleed shadow-light-lg mb-6 border-0" id="changePassword">
              <div class="card-header bg-white text-gray-700 py-4">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Heading -->
                    <h5 class="mb-0">
                      Change Password
                    </h5>

                  </div>
                </div>
              </div>
              <div class="card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form wire:submit.prevent="updatePassword">
                    <!-- Current password -->
                    <div class="form-group mb-3">
                      <label class="form-label" for="currentPassword">Current Password</label>
                      <input class="form-control p-2 @error('currentPassword') is-invalid @enderror" id="currentPassword" type="password" wire:model="currentPassword">
                      @error('currentPassword')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                      @enderror
                    </div>

                    <!-- New password -->
                    <div class="form-group mb-3">
                      <label class="form-label" for="newPassword">New Password</label>
                      <input class="form-control p-2 @error('newPassword') is-invalid @enderror" id="newPassword" type="password" wire:model="newPassword">
                      @error('newPassword')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                      @enderror
                    </div>

                    <!-- Confirm password -->
                    <div class="form-group mb-3">
                      <label class="form-label" for="confirmPassword">Confirm Password</label>
                      <input class="form-control p-2" id="confirmPassword" type="password" wire:model="newPassword_confirmation">
                    </div>


                    <div class="row">
                      <div class="col-12 col-md-auto mt-3">

                        <!-- Button -->
                        <button class="btn w-100 btn-primary text-white" type="submit">
                          Update Password
                        </button>

                      </div>
                    </div>
                  </form>

              </div>
</div>