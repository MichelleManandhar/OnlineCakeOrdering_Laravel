@extends('layouts.app')
@section('content')    

    {{-- sliders --}}
    <div id="cakeslider" class="carousel slide" data-ride="carousel">

        {{-- indicators of sliders  --}}
        <ol class="carousel-indicators">
            <li data-target="#cakeslider" data-slide-to="0" class="active"></li>
            <li data-target="#cakeslider" data-slide-to="1"></li>
            <li data-target="#cakeslider" data-slide-to="2"></li>
        </ol>

        {{-- items of sliders --}}
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="3000">
                <img src="/image/1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h4>STRESSED spelled backward is DESSERTS.</h4>
                    <h5>Huh....Did some say CAKES?</h5>
                </div>
            </div>
            <div class="carousel-item" id="slider-item" data-interval="3000">
                <img src="/image/2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>You cannot have a cake and eat it too. Either you eat it, or you have it.</h4>
                </div>
            </div>
            <div class="carousel-item" id="slider-item" data-interval="3000">
                <img src="/image/3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>A party without cake is really just a meeting.</h4>
                </div>
            </div>
        </div>

        {{-- control for sliders --}}
        <a class="carousel-control-prev" href="#cakeslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#cakeslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- /sliders --}}

    {{-- cards --}}
    <div>
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 21rem;">
                    <img src="/image/birthday.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Birthday cake calories don't count. Be quick to order it. <a href="/cakes" class="btn btn-outline-success btn-sm">Order</a></p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="card" style="width: 21rem;">
                    <img src="/image/wed.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Great love life starts with a Champagne.....and a cake. So, get one at the time of your wedding. <a href="/cakes" class="btn btn-outline-dark btn-sm">Order</a></p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="card" style="width: 21rem;">
                    <img src="/image/anni.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Anniversary is not just a date, it is the day which makes us remember how beautifully we started something. And a touch of cake helps to enrich this memorial day. <a href="/cakes" class="btn btn-outline-info btn-sm">Order</a></p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>
    {{-- /cards --}}

    <!-- START THE FEATURETTES -->
    <hr style="margin-top: 2rem; margin-bottom:2rem; " class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Ice Cream Sandwich <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Top layer of sandwiches with a layer of chocolate ice cream. Add another layer of ice cream sandwiches, and another layer of chocolate ice cream. For the icing, combine the crushed sandwich cookies and whipped topping until well mixed. Garnish with more crushed sandwich cookies.</p>
    </div>
    <div class="col-md-5">
            <img style="max-height: 30rem" src="/image/Ice Cream Sandwich Cake.jpg" class="card-img-top" alt="...">
    </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">White Forest <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">This stunning cake, for all its simplicity, is a winner. It is elegant, delicate and delicious, the perfect cake for ever occasion.</p>
    </div>
    <div class="col-md-5 order-md-1">
            <img src="/image/White Forest Cake.jpg" class="card-img-top" alt="...">
    </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Chocolate <span class="text-muted">Hmm...</span></h2>
        <p class="lead">Cake flavored with melted chocolate, cocoa powder, or both. Its chocolate, and you know what to expect...</p>
    </div>
    <div class="col-md-5">
        <img src="/image/Chocolate Cake.jpg" class="card-img-top" alt="...">
    </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2019 Company, Inc. &middot; </p>
    </footer>
@endsection
