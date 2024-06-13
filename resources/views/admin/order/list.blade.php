@extends('admin.dashboard')
@section('title',"Order List")
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
                                <h2 class="title-1">Order List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="ml-auto">
                                        Total: <span class="fs-5">{{ count($order) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2 mt-3">
                            <table class="table-data2 table">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Date</th>
                                        <th>Order Code</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    @foreach ($order as $o)
                                        <tr class="tr-shadow">
                                            <td>{{ $o->user_id }}
                                                <input type="hidden" value="{{ $o->id }}" class="orderid">
                                            </td>
                                            <td>{{ $o->user->name }}</td>
                                            <td>{{ $o->created_at->format('d/F/Y') }}</td>
                                            <td><a href="{{route('order#detail',$o->orderCode)}}">{{ $o->orderCode }}</a></td>
                                            <td>{{ $o->total_price }}</td>
                                            <td class="col-2">
                                                <select name="" id="" class="form-control status">

                                                    <option value="0"
                                                        @if ($o->status == 0) selected @endif>Pending...
                                                    </option>
                                                    <option value="1"
                                                        @if ($o->status == 1) selected @endif>Success...
                                                    </option>
                                                    <option value="2"
                                                        @if ($o->status == 2) selected @endif>Reject...</option>
                                                </select>
                                            </td>
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
    @section('script')
        <script>
            $(document).ready(function() {
                $('.status').change(function(){
                    $parent=$(this).parents("tr");
                    $id=$parent.find('.orderid').val();
                    $status=$parent.find('.status').val();
                    $data={
                        'id' : $id,
                        'status' : $status,
                    }
                $.ajax({
                    type : 'get',
                    datatype : 'json',
                    url : '/ajax/statusupdate',
                    data : $data,
                })
                })
            })
        </script>
    @endsection
