<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">

    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle"></div>
    @isset($register)
        <div class="right">
            <a href="{{ route("login")}}" class="headerButton">
                Login
            </a>
        </div>
    @endisset
</div>
<!-- * App Header -->