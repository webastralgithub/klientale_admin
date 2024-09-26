@extends('admin.layouts.app')
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="box-stats bg-light rounded d-flex align-items-start justify-content-between p-4">
                <div class="">
                    <h6 class="text-start">{{ $totalUser }}</h6>
                    <p class="">Total Users</p>
                </div>
                <img src="{{asset('img/user-square.svg')}}" class="img" />
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="box-stats bg-light rounded d-flex align-items-start justify-content-between p-4">
                <div class="">
                    <h6 class="">{{$totalSubscribedUser}}</h6>
                    <p class="">Total Subscribed Users</p>
                </div>
                <img src="{{asset('img/user-square.svg')}}" class="img" />
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@endsection