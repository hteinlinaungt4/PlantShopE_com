@extends('admin.dashboard')
@section('title',"Category")

@section('content')
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h2>Category List</h2>
        <a href="{{route('category.create')}}" class="btn btn-primary">Add Category +</a>
      </div>
      <div>
        <form class="form-header float-right d-flex my-2" action="" method="get">
            <input class="au-input au-input--sm form-control" type="text" name="search" placeholder="Search for datas &amp; reports..."  value="{{ request('search') }}"/>
            <button class="au-btn--submit btn btn-sm btn-primary" type="submit">
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
                    <th>Name</th>
                    <th>Action</th>
                </thead>
            </tr>
            @php $i=1;@endphp
           @foreach ($categories as $category)
            <tr>
                <tbody>
                    <td>{{ $category->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('category.edit',$category->id)}}" class="btn btn-warning mr-3">Edit</a>
                        <form action="{{route('category.destroy',$category->id)}}" method="Post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tbody>
            </tr>
           @endforeach
           {{ $categories->appends(request()->query())->links()}}

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
