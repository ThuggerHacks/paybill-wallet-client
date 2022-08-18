@extends("layouts.layout")

@section("title","Registar")


@section("content")

@include("_partials.login-header",["register" => true])

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Registrar agora</h1>
        <h4>Crie a sua conta aqui</h4>
    </div>
    <div class="section mb-5 p-2">
        <form action="#">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email1">E-mail</label>
                            <input type="email" class="form-control" id="email1" placeholder="Seu e-mail">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="phone">Número de telefone</label>
                            <input type="number" class="form-control" id="phone" placeholder="Seu Número de telefone">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="birthdate">Data de nascimento</label>
                            <input type="date" class="form-control" id="birthdate" placeholder="Sua Data de nascimento">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="birthplace">Local de nascimento</label>
                            <input type="text" class="form-control" id="birthplace" placeholder="Local de nascimento">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password1">Senha</label>
                            <input type="password" class="form-control" id="password1" autocomplete="off"
                                placeholder="Senha">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password2">Confirme a Senha</label>
                            <input type="password" class="form-control" id="password2" autocomplete="off"
                                placeholder="Digite a senha novamente">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox mt-2 mb-1">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheckb1">
                            <label class="form-check-label" for="customCheckb1">
                                Concordo com os <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">termos e
                                    condições</a>
                            </label>
                        </div>
                    </div>

                </div>
            </div>



            <div class="form-button-group transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Registar</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->


 <!-- Terms Modal -->
 <div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Termos e Condições</h5>
                <a href="#" data-bs-dismiss="modal">Fechar</a>
            </div>
            <div class="modal-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum, urna eget finibus
                    fermentum, velit metus maximus erat, nec sodales elit justo vitae sapien. Sed fermentum
                    varius erat, et dictum lorem. Cras pulvinar vestibulum purus sed hendrerit. Praesent et
                    auctor dolor. Ut sed ultrices justo. Fusce tortor erat, scelerisque sit amet diam rhoncus,
                    cursus dictum lorem. Ut vitae arcu egestas, congue nulla at, gravida purus.
                </p>
                <p>
                    Donec in justo urna. Fusce pretium quam sed viverra blandit. Vivamus a facilisis lectus.
                    Nunc non aliquet nulla. Aenean arcu metus, dictum tincidunt lacinia quis, efficitur vitae
                    dui. Integer id nisi sit amet leo rutrum placerat in ac tortor. Duis sed fermentum mi, ut
                    vulputate ligula.
                </p>
                <p>
                    Vivamus eget sodales elit, cursus scelerisque leo. Suspendisse lorem leo, sollicitudin
                    egestas interdum sit amet, sollicitudin tristique ex. Class aptent taciti sociosqu ad litora
                    torquent per conubia nostra, per inceptos himenaeos. Phasellus id ultricies eros. Praesent
                    vulputate interdum dapibus. Duis varius faucibus metus, eget sagittis purus consectetur in.
                    Praesent fringilla tristique sapien, et maximus tellus dapibus a. Quisque nec magna dapibus
                    sapien iaculis consectetur. Fusce in vehicula arcu. Aliquam erat volutpat. Class aptent
                    taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- * Terms Modal -->




@endsection