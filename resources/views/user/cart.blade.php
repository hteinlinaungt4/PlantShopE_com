@extends('user.master.layout')
@section('content')

{{-- <header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: infodeercreative@gmail.com</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +1 234 122 122</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">USA</a>
                                        <a class="dropdown-item" href="#">UK</a>
                                        <a class="dropdown-item" href="#">Bangla</a>
                                        <a class="dropdown-item" href="#">Hindi</a>
                                        <a class="dropdown-item" href="#">Spanish</a>
                                        <a class="dropdown-item" href="#">Latin</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Login -->
                            <div class="login">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                            <!-- Cart -->
                            <div class="cart">
                                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity">(1)</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="alazeaNav">

                    <!-- Nav Brand -->
                    <a href="index.html" class="nav-brand"><img src="{{asset('user/img/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Navbar Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="shop.html">Shop</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="portfolio.html">Portfolio</a>
                                            <ul class="dropdown">
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="single-portfolio.html">Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-post.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### --> --}}

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('user/img/bg-img/24.jpg')}});">
        <h2>Cart</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 ">
            <div class="col-lg-8 table-responsive mb-5 mx-auto">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cart as $c)
                        <tr>
                            <input type="hidden" value="{{ Auth::user()->id }}" id="userid-{{ $c->id }}">
                            <input type="hidden" value="{{ $c->post_id }}" id="postid-{{ $c->id }}">
                            <input type="hidden" id="price-{{ $c->id }}" value="{{ $c->post->price }}">

                            <td class="align-middle">
                                <img src="{{ asset('storage/posts/'.$c->post->image) }}" alt="" style="width: 50px;" class="img-thumbnail me-3">{{ $c->post->title }}
                                <input type="hidden" value="{{ $c->id }}" class="id">
                            </td>
                            <td class="align-middle">{{ $c->post->price }} Kyats</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" data-id="{{ $c->id }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="qty-{{ $c->id }}" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $c->qty }}" readonly>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" data-id="{{ $c->id }}">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle total" id="total-{{ $c->id }}">{{ $c->post->price * $c->qty }} Kyats</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-danger remove" data-id="{{ $c->id }}">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <button class="btn btn-success order">Order</button>
                <h3 class="float-right" id="summary">Total {{ $totalprice }} Kyats</h3>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.btn-plus').click(function(){
                let id = $(this).data('id');
                let qty = parseInt($('#qty-' + id).val());
                let price = parseFloat($('#price-' + id).val());
                qty++;
                let total = price * qty;
                $('#qty-' + id).val(qty);
                $('#total-' + id).html(`${total} Kyats`);
                updateSummary();
            });

            $('.btn-minus').click(function(){
                let id = $(this).data('id');
                let qty = parseInt($('#qty-' + id).val());
                if (qty > 1) {
                    let price = parseFloat($('#price-' + id).val());
                    qty--;
                    let total = price * qty;
                    $('#qty-' + id).val(qty);
                    $('#total-' + id).html(`${total} Kyats`);
                    updateSummary();
                }
            });

            $('.remove').click(function(){
                $node=$(this).parents('tr');

                let id = $(this).data('id');
                $.ajax({
                    method : 'post',
                    url : '/ajax/removecart',
                    data:{ id  },
                    datatype:'json',
                })
                $node.remove();

                updateSummary();
                location.reload();



            })


            $('.order').click(function(){
                let data = [];
                let random = Math.floor(Math.random() * 1000000) + 1;
                $('.table tbody tr').each(function(index, row){
                    data.push({
                        'user_id': $(row).find('input[id^="userid"]').val(),
                        'post_id': $(row).find('input[id^="postid"]').val(),
                        'qty': $(row).find('input[id^="qty"]').val(),
                        'total': Number($(row).find('.total').text().replace('Kyats', '').trim()),
                        'ordercode': 'Plant' + random,
                    });
                });

                   $.ajax({
                    type : 'get',
                    method: 'post',
                    data : Object.assign({},data),
                    url : '/ajax/order',
                    datatype: 'json',
                    success : function(response){
                        if(response.message == 'success'){
                            window.location.href="user/dashboard";
                        }
                    }
                   })
            });

            function updateSummary(){
                let summary = 0;
                $('.total').each(function(){
                    summary += parseFloat($(this).text().replace("Kyats","").trim());
                });
                $('#summary').html(`Total ${summary} Kyats`);
            }
        });
    </script>
@endsection
