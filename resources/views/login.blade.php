@extends("layouts.layout")

@section("title","Login")


@section("content")

@include("_partials.login-header")

 <!-- App Capsule -->
 <div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Log in</h1>
        <h4>Fill the form to log in</h4>
    </div>
    <div class="section mb-5 p-2">

        <form action="#">
            @csrf
            <div class="card">
                <div class="card-body pb-1">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email1">E-mail</label>
                            <input type="email" class="form-control" id="email1" placeholder="Your e-mail">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" autocomplete="off"
                                placeholder="Your password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-links mt-2">
                <div>
                    <a href="{{ route("register") }}">Register Now</a>
                </div>
                <div><a href="{{ route("forgot.password") }}" class="text-muted">Forgot Password?</a></div>
            </div>

            <div class="form-button-group  transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->




@endsection