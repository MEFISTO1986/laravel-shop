<div class="col-md-6 col-lg-4">
    <div class="card text-center card-product">
        <div class="card-product__img">
            <img class="card-img" src="../images/product/product1.png" alt="">
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <ul class="card-product__imgOverlay">
                    <li><button><i class="ti-search"></i></button></li>
                    <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                    <li><button><i class="ti-heart"></i></button></li>
                    @csrf
                </ul>
            </form>
        </div>
        <div class="card-body">
            <p>{{ $product->category->name }}</p>
            <h4 class="card-product__title"><a href="#">{{ $product->name }}</a></h4>
            <p class="card-product__price">{{ $product->getPrice() }}</p>
        </div>
    </div>
</div>
