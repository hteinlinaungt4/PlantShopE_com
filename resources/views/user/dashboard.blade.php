@extends('user.master.layout')
@section('title', 'Home')
@section('content')
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="{{asset('user/img/core-img/leaf.png')}}" alt="">
    </div>
</div>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-post-slides owl-carousel">
        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{asset('user/img/bg-img/1.jpg')}});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Plants exist in the weather and light rays that surround them</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque ante nec ipsum iaculis, ac iaculis ipsum porttitor. Vivamus cursus nisl lectus, id mattis nisl lobortis eu. Duis diam augue, dapibus ut dolor at, mattis maximus dolor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{asset('user/img/bg-img/2.jpg')}});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Plants exist in the weather and light rays that surround them</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque ante nec ipsum iaculis, ac iaculis ipsum porttitor. Vivamus cursus nisl lectus, id mattis nisl lobortis eu. Duis diam augue, dapibus ut dolor at, mattis maximus dolor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ##### Hero Area End ##### -->

<section class="shop-page section-padding-0-100 mt-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area -->
            <div class="col-12 col-md-4 col-lg-3 ">
                <div class="shop-sidebar-area">
                    <div class="shop-widget catagory mb-50">
                        <h4 class="widget-title">Categories</h4>
                        <div class="widget-desc">
                            <ul class="custom-control custom-checkbox d-flex align-items-center mb-2 cat" >
                                <li  class="custom-control-label" >All Plant</li>
                            </ul>

                            @foreach ($category as $c)
                                    <ul class="custom-control custom-checkbox d-flex align-items-center mb-2 cat" data-category="{{ $c->id }}">
                                        <li  class="custom-control-label" >{{ $c->name }}</li>
                                    </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Products Area -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop-products-area">
                    <div class="row" id="list">

                        @foreach ($posts as $post)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        @if (Auth::check())
                                            <input type="text" hidden class="userID" value="{{ Auth::user()->id }}">
                                        @endif
                                        <input type="text" hidden class="postID" value="{{ $post->id }}">
                                        <a href="{{route('post#detail',$post->id)}}"><img src="{{asset('storage/posts/'.$post->image)}}" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="{{route('post#detail',$post->id)}}"></a>
                                            <a href="{{route('post#detail',$post->id)}}" class="add-to-cart-btn">Detail</a>
                                            <a href="{{route('post#detail',$post->id)}}"></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('post#detail',$post->id)}}">
                                            <p>{{$post->title}}</p>
                                        </a>
                                        <h6>{{$post->price}} Kyats</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.cat').click(function(){
            let id = $(this).data('category');
            $.ajax({
                method: 'get',
                data: {id: id},
                url: '/ajax/filter',
                datatype: 'json',
                success: function(response){
                    let list = '';
                    for (let i = 0; i < response.length; i++) {
                        list += `
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        @if (Auth::check())
                                            <input type="text" hidden class="userID" value="{{ Auth::user()->id }}">
                                        @endif
                                        <input type="text" hidden class="postID" value="${response[i].id}">
                                        <a href="/detail/${response[i].id}"><img src="/storage/posts/${response[i].image}" alt=""></a>
                                        <div class="product-meta d-flex">
                                            <a href="/detail/${response[i].id}"></a>
                                            <a href="/detail/${response[i].id}" class="add-to-cart-btn">Detail</a>
                                            <a href="/detail/${response[i].id}"></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="/detail/${response[i].id}">
                                            <p>${response[i].title}</p>
                                        </a>
                                        <h6>${response[i].price} Kyats</h6>
                                    </div>
                                </div>
                            </div>`;
                    }
                    $('#list').html(list);
                }
            });
        });
    });
</script>
@endsection

