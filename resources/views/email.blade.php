@extends("layouts.layout")

@section("title","Verify email")


@section("content")
<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle"></div>
    <div class="right">
        <a href="{{ route("logout") }}">logout</a>
    </div>
</div>
<!-- * App Header -->

 <!-- App Capsule -->
 <div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Confirme o seu email</h1>
        <h4>Digite o código de verificação de email de 5 dígitos</h4>
    </div>
    <div class="section mb-5 p-2">
        <form action="#">
            @csrf
            <div class="form-group basic">
                <input type="text" class="form-control verification-input" id="smscode" placeholder="•••••"
                    maxlength="5">
            </div>

            <div class="form-button-group transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Verify</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->



@endsection