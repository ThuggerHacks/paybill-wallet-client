<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{ route("home")}}" class="item {{ $user? "active":""}}">
        <div class="col">
            <ion-icon name="pie-chart-outline"></ion-icon>
            <strong>Visão geral</strong>
        </div>
    </a>
    <a href="{{ route("user.config")}}" class="item {{ $config? "active":""}} ">
        <div class="col">
            <ion-icon name="settings-outline"></ion-icon>
            <strong>Definições</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->