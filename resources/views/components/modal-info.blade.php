@if( session('error') != null || session('success') != null )


    <!-- ios style 8 -->
    
    <div id="notification-12" class="notification-box tap-to-close show">
        <div class="notification-dialog ios-style">
            <div class="notification-header">
                <div class="in">
                    {{-- <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="imaged w24 rounded">
                    <strong>John Pacheco</strong> --}}
                </div>
                <div class="right">
                    <a href="#" class="close-button">
                        <ion-icon name="close-circle"></ion-icon>
                    </a>
                </div>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Clique para fechar</h3>
                    <div class="text">
                        @if( session('success') != null)
                            <span class="text-success">{{ session('success') }}</span>
                        @elseif ( session('error') != null)
                             <span class="text-danger">{{ session('error') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * ios style 8 -->

@endif
