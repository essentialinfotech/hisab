@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'View Fake ID - ' . @$setting->title)
<x-app-layout>
   
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> View Fake ID</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"> View Fake ID</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            {{-- Message --}}
                            @include('layouts.partials.message')

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> View Fake ID</h3>

                                    <a href="{{ route('fake-ids.index') }}" class="btn btn-info btn-sm float-right">
                                        <i class="fa fa-plus"></i> Fake ID List
                                    </a>
                                </div>

                                <div class="card-body">
                                    <div id="print" style="position: relative">
                                        <img style="width: 500px;" src="{{ asset('fake_nid.jpg') }}" alt="">
                                        <p class="font-weight-bold" style="position: absolute; top: 96px; left: 200px;">নিজের নাম</p>
                                        <p style="position: absolute;top: 125px; left: 200px;">Own Name</p>
                                        <p style="position: absolute;top: 156px; left: 200px;">পিতার নাম</p>
                                        <p style="position: absolute;top: 187px; left: 200px;">মাতার নাম</p>
                                        <p class="font-weight-bold" style="position: absolute;top: 221px; left: 271px;">12/12/2022</p>
                                        <p class="font-weight-bold fa-2x" style="position: absolute;top: 246px; left: 220px;">8087867656565</p>
                                        <img style="width: 105px; position: absolute; left: 13px; top: 84px;"
                                            src="{{ asset('user.png') }}" alt="">
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-primary" onclick="printpDiv('print')"><i
                                            class="fas fa-print"></i> General Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


    @section('scripts')
        <script type="text/javascript">
            function printpDiv(divName) {
                // $('#pprint').show();
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    @endsection

</x-app-layout>
