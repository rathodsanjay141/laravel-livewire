<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Users</h5>
                        </div>
                        <input type="search" wire:model.live='search' class="form-control float-end mx-2" style="width: 300px; height: 35px" placeholder="Search by name and email">
                        <a wire:navigate href="{{ route('create-user') }}" class="btn bg-gradient-primary btn-sm mx-2" type="button">+&nbsp; New User</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  >
                                        <a href="javascript:void(0);" wire:click="sortby('id')"> ID </a>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" wire:click="sortby('name')">
                                        Name
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" wire:click="sortby('email')">
                                        Email
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" wire:click="sortby('phone')">
                                        Phone
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" wire:click="sortby('created_at')">
                                        Creation Date
                                    </th>
                                    <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users)
                                        @forelse($users as $user)
                                        <tr>
                                            <td class="ps-4">{{$user->id}}</td>
                                            <td>
                                                <div>
                                                    <img src="{{ ($user->avatar) ? asset('storage').'/'.($user->avatar) : 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($user->email))) }}" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            <td class="text-right">{{$user->name}}</td>
                                            <td class="text-right">{{$user->email}}</td>
                                            <td class="text-right">{{$user->phone}}</td>
                                            <td class="text-right">{{$user->created_at}}</td>
                                            <td>
                                                <a wire:navigate href="{{ route('edit-user', $user) }}" type="button" class="btn btn-google"><i class="fas fa-user-edit text-neutral"></i></a>
                                                <button  type="button" wire:click="alertConfirm({{ $user->id }})" class="btn btn-google"><i class="cursor-pointer fas fa-trash text-danger"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Record Found</td>
                                        </tr>
                                        @endforelse
                                    @endif
                            </tbody>
                        </table>
                        <div class="float-end">
                                {{ $users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('swal:confirm', event => { 
        Swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              return @this.call('deleteUser',event.detail.userId)
            }
        })
    });
</script>


