@extends('admin.dashboard')
@section('title',"Order Detail List")
@section('count')
@endsection
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                        <button class=" float-right btn btn-sm "><a href="{{ route('order#listpage') }}" class=" fs-4"> << Back </a></button>
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Order Detail List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive table-responsive-data2 mt-3">
                            <table class="table-data2 table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>User Name</th>
                                        <th>Order Code</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $o)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle;">
                                            <img src="{{ asset('storage/posts/'.$o->post->image)}}" alt="" class="img-thumbnail border-0" style="height: 80px; padding:10px; object-fit:cover;">
                                            {{ $o->post->title }}
                                        </td>
                                        <td style="vertical-align: middle;">{{ $o->user->name }}</td>
                                        <td style="vertical-align: middle;">{{ $o->orderCode }}</a></td>
                                        <td style="vertical-align: middle;">{{ $o->qty }}</td>
                                        <td style="vertical-align: middle;">{{ $o->total }}</td>
                                        <td style="vertical-align: middle;">{{ $o->created_at->format('d/F/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->

    @endsection
