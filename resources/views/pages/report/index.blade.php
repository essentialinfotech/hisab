@section('title', 'Report - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Report</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ Auth::guard('admin')->user() ? route('admin.dashboard') : route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>



            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Report</h3>
                                </div>

                                <div class="card-body">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <a href="{{ route('cost-report-all') }}">
                                                        <div class="info-box bg-info">
                                                            <span class="info-box-icon"><i
                                                                    class="fas fa-chart-line"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Cost Report</span>
                                                                <span
                                                                    class="info-box-number">{{ number_format($totalCost, 2) }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <a href="{{ route('revenue-report-all') }}">
                                                        <div class="info-box bg-success">
                                                            <span class="info-box-icon"><i
                                                                    class="fas fa-chart-bar"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Revenue Report</span>
                                                                <span class="info-box-number">{{ number_format($totalRevenue, 2) }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <a href="#">
                                                        <div class="info-box bg-primary">
                                                            <span class="info-box-icon"><i
                                                                    class="fas fa-hand-holding-usd"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Cash Report</span>
                                                                <span class="info-box-number">{{ number_format($totalCash, 2) }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
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
