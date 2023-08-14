<div>
    <form wire:submit="save" role="form text-left">
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                 style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src=" {{ ($avatar) ? $avatar->temporaryUrl() : auth()->user()->avtarUrl() }}" alt="Profile Photo" class="w-100 border-radius-lg shadow-sm">

                            <a  class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2" onclick="document.getElementById('avatar').click();">
                                <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="Edit Image"> 
                                </i>
                            </a>
                            <input class="d-none" id="avatar" accept="image/png, image/jpg" name="avatar"  wire:model.live="avatar" type="file">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $users->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ __(' Admin') }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Profile Information') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Full Name') }}  <span class="text-danger">*</span></label>
                                <div class="@error('users.name')border border-danger rounded-2 @enderror">
                                    <input wire:model.live="users.name" class="form-control" type="text" placeholder="Name"
                                           id="user-name">
                                </div>
                                @error('users.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}  <span class="text-danger">*</span></label>
                                <div class="@error('users.email')border border-danger rounded-2 @enderror">
                                    <input wire:model.live="users.email" class="form-control" type="email"
                                           placeholder="@example.com" id="user-email">
                    </div>
                                @error('users.email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="users.phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('users.phone')border border-danger rounded-2 @enderror">
                                    <input wire:model.live="users.phone" class="form-control" type="tel"
                                           placeholder="40770888444" id="phone">
                    </div>
                                @error('users.phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="users.location" class="form-control-label">{{ __('Location') }}</label>
                                <div class="@error('users.location') border border-danger rounded-2 @enderror">
                                    <input wire:model.live="users.location" class="form-control" type="text"
                                           placeholder="Location" id="name">
                                </div>
                                @error('users.location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'About Me' }}</label>
                        <div class="@error('users.about')border border-danger rounded-2 @enderror">
                            <textarea wire:model.live="users.about" class="form-control" id="about" rows="3"
                                      placeholder="Say something about yourself"></textarea>
                        </div>
                        @error('users.about') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    
                    @error('avatar') <div class="text-danger">{{ $message }}</div> @enderror
                    <div wire:loading wire:target="photo">Uploading...</div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
