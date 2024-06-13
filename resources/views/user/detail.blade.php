@extends('user.master.layout')
@section('title', 'Detail')
@section('content')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url({{ asset('user/img/bg-img/24.jpg') }});">
            <h2>SHOP DETAILS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item rounded  " style="background-color:#70c745;"><a href="{{route('user.dashboard')}}" class="text-white p-3"><i class="fa fa-home  text-white p-1"></i> Home</a></li>
                            <li class="breadcrumb-item">Shop</li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('storage/posts/' . $post->image) }}"
                                            alt="1">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <input type="hidden" value="{{ Auth::user()->id }}" id="userid">
                        <input type="hidden" value="{{ $post->id }}" id="postid">
                        <input type="hidden" value="{{ $post->price }}" id="price-{{ $post->id }}">

                        <div class="single_product_desc">
                            <h4 class="title">{{ $post->title }}</h4>
                            <h4 class="price" id="total">{{ $post->price }} Kyats</h4>
                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <div class="cart clearfix d-flex align-items-center" method="post">
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-minus" data-id="{{ $post->id }}">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="number" min="1"
                                            class="form-control bg-secondary border-0 text-center " value="1"
                                            id="qty-{{ $post->id }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-plus" data-id="{{ $post->id }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" name="addtocart" value="5" class="alazea-btn ml-15 btn"
                                        id="cart" style="background-color:#70c745;color:white">Add to cart</button>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>Category:</span> <span>{{ $post->category->name }}</span></p>
                            </div>

                            <div class="short_overview">
                                <div class="product_details_tab clearfix">
                                    <!-- Tabs -->
                                    <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                                        <li class="nav-item">
                                            <a href="#description" class="nav-link active" data-toggle="tab"
                                                role="tab">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Care
                                                Description</a>
                                        </li>

                                    </ul>
                                    <!-- Tab Content -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="description">
                                            <div class="description_area">
                                                <p>{{ $post->content }}</p>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                            <div class="additional_info_area">
                                                <p>{{ $post->care_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
            </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                @foreach ($posts as $post)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-area mb-50">
                            <!-- Product Image -->
                            <div class="product-img">
                                @if (Auth::check())
                                    <input type="text" hidden class="userID" value="{{ Auth::user()->id }}">
                                @endif
                                <input type="text" hidden class="postID" value="{{ $post->id }}">
                                <a href="{{ route('post#detail', $post->id) }}"><img
                                        src="{{ asset('storage/posts/' . $post->image) }}" alt=""></a>
                                <div class="product-meta d-flex">
                                    <a href="{{ route('post#detail', $post->id) }}"></a>
                                    <a href="{{ route('post#detail', $post->id) }}" class="add-to-cart-btn">Detail</a>
                                    <a href="{{ route('post#detail', $post->id) }}"></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="{{ route('post#detail', $post->id) }}">
                                    <p>{{ $post->title }}</p>
                                </a>
                                <h6>{{ $post->price }} Kyats</h6>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>




@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-plus').click(function() {
                let id = $(this).data('id');
                let qty = parseInt($('#qty-' + id).val());
                let price = parseFloat($('#price-' + id).val());
                qty++;
                let total = price * qty;
                $('#qty-' + id).val(qty);
                $('#total').html(`${total} Kyats`);
            });

            $('.btn-minus').click(function() {
                let id = $(this).data('id');
                let qty = parseInt($('#qty-' + id).val());
                if (qty > 1) {
                    let price = parseFloat($('#price-' + id).val());
                    qty--;
                    let total = price * qty;
                    $('#qty-' + id).val(qty);
                    $('#total').html(`${total} Kyats`);
                }
            });

            $('#cart').click(function() {
                let data = {
                    'qty': $('#qty-' + $('#postid').val()).val(),
                    'post_id': $('#postid').val(),
                    'user_id': $('#userid').val(),
                };
                $.ajax({
                    type: 'get',
                    method: 'post',
                    url: '/ajax/cart',
                    datatype: 'json',
                    data: data,
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "/user/dashboard";
                        }
                    }
                });
            });
        });
    </script>
@endsection
