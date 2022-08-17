@extends("layouts.layout")

@section("title","Received")

@section("content")

@include("_partials.header",["title" => "Received"])

<!-- App Capsule -->
<div id="appCapsule">
     <!-- Transactions -->
     <div class="section mt-2">
        <div class="section-title">Today</div>
        <div class="transactions">
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Amazon</strong>
                        <p>Shopping</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger"> - $ 150</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/brand/2.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Apple</strong>
                        <p>Appstore Purchase</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger">- $ 29</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/avatar/avatar3.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Alex Ljung</strong>
                        <p>Transfer</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price">+ $ 1,000</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/avatar/avatar4.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Beatriz Brito</strong>
                        <p>Transfer</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger">- $ 186</div>
                </div>
            </a>
            <!-- * item -->
        </div>
    </div>
    <!-- * Transactions -->

    <!-- Transactions -->
    <div class="section mt-2">
        <div class="section-title">Yesterday</div>
        <div class="transactions">
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Amazon</strong>
                        <p>Shopping</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger"> - $ 150</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/brand/2.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Apple</strong>
                        <p>Appstore Purchase</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger">- $ 29</div>
                </div>
            </a>
            <!-- * item -->
        </div>
    </div>
    <!-- * Transactions -->

    <!-- Transactions -->
    <div class="section mt-2">
        <div class="section-title">Sep 20, 2020</div>
        <div class="transactions">
            <!-- item -->
            <a href="{{ route("transation.details") }}" class="item">
                <div class="detail">
                    <img src="assets/img/sample/brand/3.jpg" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Envato</strong>
                        <p>Shopping</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger"> - $ 24</div>
                </div>
            </a>
            <!-- * item -->
        </div>
    </div>
    <!-- * Transactions -->


    <div class="section mt-2 mb-2">
        <a href="#" class="btn btn-primary btn-block btn-lg">Load More</a>
    </div>
</div>

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection