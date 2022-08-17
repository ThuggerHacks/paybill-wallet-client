@extends("layouts.layout")

@section("title","Transition - details")


@section("content")

 <!-- App Header -->
 <div class="appHeader">
    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Transaction Detail
    </div>
    <div class="right">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->

<x-delete-modal></x-delete-modal>

 <!-- App Capsule -->
 <div id="appCapsule" class="full-height">

    <div class="section mt-2 mb-2">


        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2">Payment Sent</h3>
        </div>

        <ul class="listview flush transparent simple-listview no-space mt-3">
            <li>
                <strong>Status</strong>
                <span class="text-success">Success</span>
            </li>
            <li>
                <strong>To</strong>
                <span>Jordi Santiago</span>
            </li>
            <li>
                <strong>Bank Name</strong>
                <span>Envato Bank</span>
            </li>
            <li>
                <strong>Transaction Category</strong>
                <span>Shopping</span>
            </li>
            <li>
                <strong>Receipt</strong>
                <span>Yes</span>
            </li>
            <li>
                <strong>Date</strong>
                <span>Sep 25, 2020 10:45 AM</span>
            </li>
            <li>
                <strong>Amount</strong>
                <h3 class="m-0">$ 24</h3>
            </li>
        </ul>


    </div>

</div>
<!-- * App Capsule -->

<x-bottom-tab :user="false" :config="false" ></x-bottom-tab>


@endsection