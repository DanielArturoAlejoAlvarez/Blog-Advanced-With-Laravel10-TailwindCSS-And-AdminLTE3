<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        {{-- {{$search}} --}}
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Search User Title...">
        </div>
        @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px">
                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary btn-sm">EDIT</a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else
            <div class="card-body">
                <h4><strong>No such record available.</strong></h4>
            </div>
        @endif
    </div>    
</div>
