@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'Dashboard - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ Auth::guard('admin')->user() ? route('admin.dashboard') : route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            @php
                $totalCustomer = App\Models\Customer::where('status', 1)->count();
                $totalWarhouse = App\Models\Warhouse::count();
                $totalUser = App\Models\User::count();
            @endphp


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Dashboard</h3>
                                </div>

                                <div class="card-body">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="box-header with-border">
                                                <h2 class="text-uppercase"><b>WELCOME TO
                                                        "{{ @$setting->welcome_title }}"</b></h2>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-3 col-6">
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <h3>{{ $totalCustomer < 9 ? '0' . $totalCustomer : $totalCustomer }}
                                                            </h3>
                                                            <p>Total Cost</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-stats-bars"></i>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3 col-6">
                                                    <div class="small-box bg-info">
                                                        <div class="inner">
                                                            <h3>{{ $totalWarhouse < 9 ? '0' . $totalWarhouse : $totalWarhouse }}
                                                            </h3>
                                                            <p>Total Revenue</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-bag"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-6">
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <h3>50</h3>
                                                            <p>Today Cost</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-pie-graph"></i>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3 col-6">
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <h3>100</h3>
                                                            <p>Today Revenue</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-stats-bars"></i>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
