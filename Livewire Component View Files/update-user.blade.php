<div class="card card-bleed shadow-light-lg mb-6 border-0" id="general">
              <div class="card-header bg-white text-gray-700 py-4">

                <!-- Heading -->
                <h5 class="mb-0">
                  Basic Information
                </h5>

              </div>
              <div class="card-body">

                <!-- Form -->
                <form wire:submit.prevent="updateUserInfo">
                  <div class="row">
                    <div class="col-md-12 text-center mt-3 mb-5">

                      <!-- Avatar -->
                      @if ($avatar)
                          <img height="90" src="{{ $avatar->temporaryUrl() }}" alt="Profile Photo" class="rounded-circle">
                      @else
                          <img height="90" src="{{ auth()->user()->avatarUrl() }}" alt="Profile Photo" class="rounded-circle">
                      @endif
                      <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" class="ms-3" wire:model="avatar"/>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- Name -->
                      <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control p-2" id="name" type="text" placeholder="Full name" wire:model="name">
                      </div>

                    </div>
                    <div class="col-12 col-md-6 mb-5">

                      <!-- Email -->
                      <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control p-2" id="email" type="email" placeholder="{{Auth::user()->email}}" disabled>
                      </div>

                    </div>

                    <div class="col-12 col-md-auto">

                      <!-- Button -->
                      <button  class="btn w-100 btn-primary text-white" type="submit">
                        Save changes
                      </button>

                    </div>
                  </div>
                </form>

              </div>
</div>