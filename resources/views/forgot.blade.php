@extends("layouts.layout")

@section("title","Esqueceu senha")


@section("content")

@include("_partials.login-header")

  <!-- App Capsule -->
  <div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Esqueceu a senha</h1>
        <h4>Digite seu e-mail para redefinir sua senha</h4>
    </div>
    <div class="section mb-5 p-2">
        <form action="#">
            @csrf
            <div class="card">
                <div class="card-body pb-1">

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email1">E-mail</label>
                            <input type="email" class="form-control" id="email1" placeholder="Seu e-mail">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-button-group transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Redefinir senha</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->

@endsection