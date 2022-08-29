<div class="justify-content-center text-center">
    @auth
        @if ($avatar)
            <img height="90" src="{{ $avatar->temporaryUrl() }}" alt="Profile Photo" class="rounded-circle">
        @else
            <img height="90" src="{{ auth()->user()->avatarUrl() }}" alt="Profile Photo" class="rounded-circle">
            <div class="d-flex justify-content-around mt-2">
                <div class="text-indigo cursor-pointer" onclick="document.getElementById('avatar').click();">Change Avatar</div>
            </div>
        @endif
        <input class="d-none" type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" class="mt-2 mx-5" wire:model="avatar"/>

        <button  class="btn btn-primary text-white mt-3" wire:click="changeAvatar">
            Save changes
        </button>
    @else
        <img height="90" src="http://www.gravatar.com/avatar/?d=identicon" alt="Profile Photo" class="rounded-circle">
        <div class="d-flex justify-content-around mt-2">
                <div class="text-indigo cursor-pointer" data-bs-toggle="modal" data-bs-target="#loginModal">Change Avatar</div>
        </div>
    @endauth
</div>
