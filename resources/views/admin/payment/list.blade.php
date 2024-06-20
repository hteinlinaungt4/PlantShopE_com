@extends('admin.dashboard')
@section('title',"Payment List")
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
                                <h2 class="title-1">Payment List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive table-responsive-data2 mt-3">
                            <table class="table-data2 table">
                                <thead>
                                    <tr>
                                        <th>Order Code</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Payment_method</th>
                                        <th>Order Start Date</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    @foreach ($payments as $p)
                                       <tr>
                                        <td><a href="{{route('order#detail',$p->orderCode)}}">{{ $p->orderCode }}</a></td>
                                        <td>{{$p->name}}</td>
                                            <td>{{$p->phone_number}}</td>
                                            <td>{{$p->email}}</td>
                                            <td>{{$p->address}}</td>
                                            <td>{{$p->payment_method}}</td>
                                            <td>{{ $p->created_at->format('d/F/Y') }}</td>
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
