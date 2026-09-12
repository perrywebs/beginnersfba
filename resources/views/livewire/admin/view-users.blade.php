<div class="card">
    <div class="card-body">
        <h5 class="card-title">Approved Users</h5>
        <div class="table-responsive table-responsive-x">
            <table class="table table-responsive-x">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">email</th>
                        <th scope="col">Approved on</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item => $user)
                    <tr>
                        <th scope="row">{{ $item+1}}</th>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->country}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ date('Y/M/d h:i a', strtotime($user->created_at)) }}</td>
                        <td>${{ number_format($user->account_bal) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{route('admin_editUser',[$user->id])}}" class="btn btn-sm btn-primary m-1"><i class="bi bi-pencil-square"></i>
                                    manage
                                </a>
                                <button class="btn btn-sm btn-danger m-1" wire:click="deleteUser({{ $user->id }})" wire:confirm="Are you sure you want to delete this user?">
                                    <i class="bi bi-archive-fill"></i> 
                                    Delete
                                </button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- End Table with stripped rows -->

    </div>
</div>