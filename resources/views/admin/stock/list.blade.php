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
                                <tbody id="data">
                                    @foreach ($posts as $o)
                                        <tr class="tr-shadow   @if($o->qty < 1) bg-danger  text-white @else bg-success text-black @endif">
                                            <td class="">{{ $o->title }}</td>
                                            <td>
                                                <img width="100px" height="80px" style="object-fit: cover"  src="{{ asset('storage/posts/'.$o->image)}}">
                                            </td>
                                            <td>{{$o->qty}}</td>
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
