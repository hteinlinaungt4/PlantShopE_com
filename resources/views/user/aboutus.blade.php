@extends('user.master.layout')
@section('content')


<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('user/img/bg-img/24.jpg')}});">
        <h2>About Us</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 ">
            <div class=" mx-auto">

                <div>
                    <div class="container-fluid">
                        <div class="row px-xl-5">
                            <div class="col-lg-8 mb-5 mx-auto">
                                <div class="contact-form bg-light p-30">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <h3 style="border-bottom:2px solid orange;  padding:20px 0;">Welcome to Plant Shop</h3>
                                            <p class="my-3">Welcome to Green Haven, your local plant paradise dedicated to bringing the beauty and tranquility of nature into every home and workspace. Founded by plant enthusiasts, we understand the profound impact that greenery can have on well-being and environment. Our carefully curated selection of indoor and outdoor plants, ranging from hardy succulents to lush ferns, ensures you find the perfect green companion for any space.

                                                At Green Haven, we believe in the transformative power of plants. Our knowledgeable staff is passionate about plants and committed to providing expert advice, personalized recommendations, and ongoing support to help your plants thrive. Whether you are a seasoned plant parent or just starting your green journey, we offer workshops, care guides, and a friendly community to grow with.

                                                Visit us to explore our diverse plant collection, unique planters, and accessories. Let Green Haven help you create a vibrant, healthy, and beautiful environment. Come grow with us!</p>
                                            <div class="my-5">
                                                <a href="" class="btn btn-dark text-white">Our Blog</a>
                                                <a href="" class="btn btn-warning ml-3">Contant us</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img style=" width:100%;height:100%;object-fit:cover; padding:50px;" src="https://cdn.shopify.com/s/files/1/0248/6983/products/PLANTINABOXTEST1664_1_bc00af73-d8f4-4775-a7b0-5f728054e141_1080x.jpg?v=1689140468" alt="">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
@section('script')
    <script>
         $('#file').on('change', function() {
            var file_length=this.files.length;
            $('.hide').html('');
            $('.preview').html('');
            $('#select').html('');
            for (let i = 0; i < file_length; i++) {
                $('.preview').append(`<img class="float-right" width="150px" height="150px" style="object-fit:cover;border:5px solid black;padding:10px;border-radius:50%"  src="${URL.createObjectURL(event.target.files[i])}"/>`);
            }
    })
    </script>
@endsection
