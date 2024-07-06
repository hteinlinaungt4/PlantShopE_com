@extends('admin.dashboard')
@section('title',"Stock List")
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Stock List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive table-responsive-data2 mt-3">
                            <table class="table-data2 table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Product Name</th>
                                        <th>Stock Remain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $o)
                                        <tr class="tr-shadow">
                                            <td class="" style="vertical-align: middle;">{{ $o->title }}</td>
                                            <td style="vertical-align: middle;">
                                                <img width="100px" height="80px" style="object-fit: cover"  src="{{ asset('storage/posts/'.$o->image)}}">
                                            </td>
                                            @if ($o->qty < 1)
                                            <td  style="vertical-align: middle;"><span class="badge rounded-pill bg-danger p-3 text-white">{{$o->qty}}</span></td>
                                            @else
                                            <td  style="vertical-align: middle;"><span class="badge rounded-pill bg-success p-3 text-white">{{$o->qty}}</span></td>
                                            @endif
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
