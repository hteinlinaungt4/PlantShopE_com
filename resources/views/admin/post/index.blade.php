@extends('admin.dashboard')
@section('title',"Post")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h2>Post List</h2>
             <a href="{{route('post.create')}}" class="btn btn-primary">Add Post +</a>
        </div>
        <div>
            <form class="form-header float-end d-flex" action="" method="get">
                <input class="au-input au-input--sm form-control" type="text" name="search" placeholder="Search for datas &amp; reports..."  value="{{ request('search') }}"/>
                <button class="au-btn--submit btn btn-primary" type="submit">
                   Search
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div id="success-message" style="display: none;">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Care Description</th>
                    <th>Action</th>
                </thead>
            </tr>
            @php $i=1;@endphp
           @foreach ($posts as $post)
            <tr>
                <tbody>
                    <td>@php echo $i;$i++; @endphp</td>
                    <td>
                        <img width="100px" height="80px" style="object-fit: cover"  src="{{ asset('storage/posts/'.$post->image)}}">
                    </td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->care_description }}</td>
                    <td class="d-flex">
                        <a href="{{ route('post.edit',$post->id)}}" class="btn btn-warning mr-3">Edit</a>
                        <form action="{{route('post.destroy',$post->id)}}" method="Post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tbody>
            </tr>
           @endforeach
        </table>
    </div>
   </div>
@endsection
@section('script')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('success-message');

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage.innerText,
            });
         }
        });

    </script>
@endsection
