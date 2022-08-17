@extends("layouts.layout")

@section("title","Settings")


@section("content")

@include("_partials.header",["title" => "Settings"])

<div id="appCapsule">

    <div class="section mt-3 text-center">
        <div class="avatar-section">
            <a href="#" data-bs-toggle="modal" data-bs-target="#DialogImage">
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w100 rounded">
                <span class="button">
                    <ion-icon name="camera-outline"></ion-icon>
                </span>
            </a>
        </div>
    </div>

    <div class="listview-title mt-1">Theme</div>
    <ul class="listview image-listview text inset no-line">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Dark Mode
                    </div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                        <label class="form-check-label" for="darkmodeSwitch"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    {{-- <div class="listview-title mt-1">Notifications</div>
    <ul class="listview image-listview text inset">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Payment Alert
                        <div class="text-muted">
                            Send notification when new payment received
                        </div>
                    </div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                    </div>
                </div>
            </div>
        </li> --}}
        {{-- <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Notification Sound</div>
                    <span class="text-primary">Beep</span>
                </div>
            </a>
        </li> --}}
    </ul>

    <div class="listview-title mt-1">Profile Settings</div>
    <ul class="listview image-listview text inset">
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogForm">
                <div class="in">
                    <div>Change Username</div>
                </div>
                <div>
                    Braimo Selimane
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogForm">
                <div class="in">
                    <div>Update E-mail</div>
                </div>
                <div>
                    imolast66@gmail.com
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogForm">
                <div class="in">
                    <div>Change Phone Number</div>
                </div>
                <div>
                    +258848499142
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item" >
                <div class="in">
                    <div>Birthdate</div>
                </div>
                <div>
                    19/02/2002
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Birthplace</div>
                </div>
                <div>
                    Nampula
                </div>
            </a>
        </li>
        {{-- <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Address</div>
                    <span class="text-primary">Edit</span>
                </div>
            </a>
        </li> --}}
        {{-- <li>
            <div class="item">
                <div class="in">
                    <div>
                        Private Profile
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2">
                        <label class="form-check-label" for="SwitchCheckDefault2"></label>
                    </div>
                </div>
            </div>
        </li> --}}
    </ul>

    <div class="listview-title mt-1">Security</div>
    <ul class="listview image-listview text mb-2 inset">
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogForm1">
                <div class="in">
                    <div>Update Password</div>
                </div>
            </a>
        </li>
        {{-- <li>
            <div class="item">
                <div class="in">
                    <div>
                        2 Step Verification
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
                        <label class="form-check-label" for="SwitchCheckDefault3"></label>
                    </div>
                </div>
            </div>
        </li> --}}
        {{-- <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Log out all devices</div>
                </div>
            </a>
        </li> --}}
    </ul>

</div>

<x-change-password></x-change-password>
<x-user-data-modal></x-user-data-modal>
<x-picture-modal></x-picture-modal>
<x-bottom-tab :user="false" :config="true" ></x-bottom-tab>


@endsection