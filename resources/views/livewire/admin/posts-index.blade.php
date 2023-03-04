<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        {{-- {{$search}} --}}
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Search Post Title...">
        </div>
        @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td width="10px">
                            <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning btn-sm">EDIT</a>
                        </td>
                        <td width="10px">    
                            <form method="POST" action="{{route('admin.posts.destroy', $post)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
        @else
            <div class="card-body">
                <h4><strong>No such record available.</strong></h4>
            </div>
        @endif
    </div>    
</div>
