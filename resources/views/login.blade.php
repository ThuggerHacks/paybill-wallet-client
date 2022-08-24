@extends("layouts.layout")

@section("title","Login")


@section("content")

@include("_partials.login-header")

 <!-- App Capsule -->
 <div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Entrar</h1>
        <h4>Preencha o formulário para entrar</h4>
    </div>
    <div class="section mb-5 p-2">

        <form action="{{ route("login.make")}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body pb-1">
                    @if(session('error') != null)
                      <small class="text-danger">  {{ session('error') }} </small>
                    @endif
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email1">E-mail ou celular</label>
                            <input type="text" class="form-control" id="email1" name="login" placeholder="Seu e-mail">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password1">Senha</label>
                            <input type="password" class="form-control" name="password" id="password1" autocomplete="off"
                                placeholder="Sua Senha">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-links mt-2">
                <div>
                    <a href="{{ route("register") }}">Registrar agora</a>
                </div>
                <div><a href="{{ route("forgot.password") }}" class="text-muted">Esqueceu a senha?</a></div>
            </div>

            <div class="form-button-group  transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->

@endsection

