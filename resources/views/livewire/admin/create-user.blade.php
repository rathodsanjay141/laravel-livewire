<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0"> @if($users->id) Edit User @else Create User @endif </h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid py-4">
                    <form wire:submit="{{ ($users->id) ? 'editUser' : 'saveUser' }}" role="form text-left">
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label">{{ __('Full Name') }} <span class="text-danger">*</span></label>
                                        <div class="@error('users.name')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="users.name" class="form-control" type="text" placeholder="Name"
                                                   id="user-name">
                                        </div>
                                        @error('users.name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <div class="@error('users.email')border border-danger rounded-2 @enderror">
                                            <input autocomplete="off" wire:model.live="users.email" class="form-control" type="email"
                                                   placeholder="@example.com" id="user-email">
                                        </div>
                                        @error('users.email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label">{{ __('Password') }} @if(!$users->id) <span class="text-danger">*</span> @endif </label>
                                        <div class="@error('password') border border-danger rounded-2 @enderror">
                                            <input autocomplete="off" wire:model.live="password" type="password" class="form-control"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">{{ __('Confirm Password') }} @if(!$users->id) <span class="text-danger">*</span> @endif </label>
                                        <div class="@error('password_confirmation') border border-danger rounded-2 @enderror">
                                            <input wire:model.live="password_confirmation" type="password" class="form-control"
                                                placeholder="Confirm Password" aria-label="Password"
                                                aria-describedby="password_confirmation-addon">
                                        </div>
                                        @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
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
                                            <input wire:model.live="users.location" class="form-control" type="text" placeholder="Location" id="name">
                                        </div>
                                        @error('users.location') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about">{{ 'About Me' }}</label>
                                <div class="@error('users.about')border border-danger rounded-2 @enderror">
                                    <textarea wire:model.live="users.about" class="form-control" id="about" rows="3" placeholder="Say something about yourself"></textarea>
                                </div>
                                @error('users.about') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
