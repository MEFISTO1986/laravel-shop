@extends('layout')

@section('title')
    <title>Aroma Shop - Cart</title>
@endsection

@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shopping Cart</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->



    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($basket->products as $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="../images/cart/cart1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $product->getPrice() }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="{{ $product->pivot->quantity }}" title="Quantity:" class="input-text qty">
                                    <form action="{{ route('basket-add', $product) }}" method="POST">
                                        <button type="submit" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        @csrf
                                    </form>
                                    <form action="{{ route('basket-remove', $product) }}" method="POST">
                                        <button type="submit" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $basket->getFormattedTotalPriceRow($product->id) }}</h5>
                            </td>
                        </tr>
                        @endforeach

                        <tr class="bottom_button">
                            <td>
                                <a class="button" href="#">Update Cart</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="button" href="#">Have a Coupon?</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{ $basket->getFormattedTotalPrice() }}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="{{ route('main') }}">Continue Shopping</a>
                                    <a class="primary-btn ml-2" href="{{ route('checkout') }}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
    <script>

    </script>
@endsection
