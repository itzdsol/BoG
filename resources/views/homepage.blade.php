@extends('layouts.bogapp')

@section('content')

<section class="banner_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="banner_inner">
            <div class="banner_title aos-item" data-aos="fade-up">REMODELLING BUILDING CONSTRUCTION THROUGH TECHNOLOGY</div>
            <p class="banner_p aos-item" data-aos="fade-up">With a click away, we will help you on your next building construction through technology: taking you through every process and every product.</p>
            <div class="search_div aos-item" data-aos="zoom-in">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search" name="">
            <a href="#">Search</a>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="startproject_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="startproject_inner">
            <div class="start_project_title aos-item" data-aos="fade-up">Want to start a project?</div>
            <a class="signup aos-item" data-aos="fade-up" href="#">Sign Up</a>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="offer_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="main_title text-center aos-item" data-aos="fade-up">What We Offer</div>
            <hr class="border_line aos-item" data-aos="zoom-in">
            <p class="p_text text-center aos-item" data-aos="fade-up">We offer a range of services to help you with your building and construction projects. we have something for everyone buyers, sellers and contractors alike.</p>
        </div>
    </div>

        <div class="row">
        <div class="col-md-4">
            <div class="offer_div aos-item" data-aos="zoom-in">
            <div class="offer_img">
                <img src="assets/images/icon1.png" alt="icon1">
            </div>
            <div class="offer_title">HIRE A CONTRACTOR</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="offer_div aos-item" data-aos="zoom-in">
            <div class="offer_img">
                <img src="assets/images/icon2.png" alt="icon2">
            </div>
            <div class="offer_title">Buy Products</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="offer_div aos-item" data-aos="zoom-in">
            <div class="offer_img">
                <img src="assets/images/icon3.png" alt="icon3">
            </div>
            <div class="offer_title">Get Estimate</div>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="featured_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="main_title featured_title text-center aos-item" data-aos="fade-up">Featured Work</div>
            <hr class="border_line aos-item" data-aos="zoom-in">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <div class="featured_div aos-item" data-aos="zoom-in">
            <div class="overlay"></div>
            <div class="f_title">New Construction</div>
            <img src="assets/images/feature.jpg" alt="feature">
        </div>
        </div>
        <div class="col-md-4">
        <div class="featured_div aos-item" data-aos="zoom-in">
            <div class="overlay"></div>
            <div class="f_title">New Construction</div>
            <img src="assets/images/feature.jpg" alt="feature">
        </div>
        </div>
        <div class="col-md-4">
        <div class="featured_div aos-item" data-aos="zoom-in">
            <div class="overlay"></div>
            <div class="f_title">New Construction</div>
            <img src="assets/images/feature.jpg" alt="feature">
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="view_profile text-center mt-1 aos-item" data-aos="zoom-in">
            <a href="#" class="view_profile_btn">View All<i class="fas fa-image"></i></a>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="arrival_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="main_title text-center aos-item" data-aos="fade-up">New Arrivals</div>
            <hr class="border_line aos-item" data-aos="zoom-in">
        </div>
    </div>

        <div class="row">
        <div class="col-md-6">
            <div class="arrival_left aos-item" data-aos="zoom-in">
            <img src="assets/images/arrival.png" alt="arrival">
            </div>
        </div>
        <div class="col-md-6">
            <div class="arrival_right">
            <div class="arrival_upper aos-item" data-aos="fade-up">
                <div class="arrival_upper_left">
                Products
                </div>
                <a class="view_all" href="#">View All<i class="fas fa-circle-right"></i></a>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="arrival_inner aos-item" data-aos="zoom-in">
                    <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
                    <img src="assets/images/a1.jpg" alt="a1">
                    <div class="shop_title">Shop Item 1</div>
                    <div class="price">$ 200.00</div>
                    <a href="" class="view_profile_btn cart_btn">Add to Cart</a>
                </div>
                </div>
                <div class="col-md-6">
                <div class="arrival_inner aos-item" data-aos="zoom-in">
                    <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
                    <img src="assets/images/a1.jpg" alt="a1">
                    <div class="shop_title">Shop Item 1</div>
                    <div class="price">$ 200.00</div>
                    <a href="" class="view_profile_btn cart_btn">Add to Cart</a>
                </div>
                </div>
            </div>
            <div class="arrival_upper aos-item" data-aos="fade-up">
                <div class="arrival_upper_left">
                Services
                </div>
                <a class="view_all" href="#">View All<i class="fas fa-circle-right"></i></a>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="arrival_inner aos-item" data-aos="zoom-in">
                    <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
                    <img src="assets/images/a1.jpg" alt="a1">
                    <div class="shop_title">Shop Item 1</div>
                    <div class="price">$ 200.00</div>
                    <a href="" class="view_profile_btn cart_btn">Add to Cart</a>
                </div>
                </div>
                <div class="col-md-6">
                <div class="arrival_inner aos-item" data-aos="zoom-in">
                    <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
                    <img src="assets/images/a1.jpg" alt="a1">
                    <div class="shop_title">Shop Item 1</div>
                    <div class="price">$ 200.00</div>
                    <a href="" class="view_profile_btn cart_btn">Add to Cart</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


<section class="brand_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="assets/images/b1.png" alt="b1"></div>
            <div class="swiper-slide"><img src="assets/images/b2.png" alt="b2"></div>
            <div class="swiper-slide"><img src="assets/images/b3.png" alt="b3"></div>
            <div class="swiper-slide"><img src="assets/images/b4.png" alt="b4"></div>
            <div class="swiper-slide"><img src="assets/images/b5.png" alt="b5"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="customer_outer">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="customer_upper">
            <div class="customer_left">
            <div class="main_title featured_title text-center aos-item" data-aos="fade-up">Customer Stories</div>
            <hr class="border_line aos-item" data-aos="zoom-in">
            </div>
            <div class="customer_right">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="swiper mySwiper1">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="customer_inner">
                <div class="customer_title">Awesome Service</div>
                <p>the constructor I hired delivered on his promise in a professional and timely manner</p>
                <img src="assets/images/client.jpg" alt="client">
                <div class="client_name">Jean Kirsten</div>
                <div id="full-stars-example-two">
                <div class="rating-group">
                    <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                </div>
            </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="customer_inner">
                <div class="customer_title">Accurate Pricing</div>
                <p>My one stop shop for all my needed materials for a building project. The prices are right and the shipping is affordable.</p>
                <img src="assets/images/client2.jpg" alt="client2">
                <div class="client_name">Jean Kirsten</div>
                <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

@endsection
