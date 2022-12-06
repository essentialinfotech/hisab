@section('title', 'Cost Report - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cost Report <span class="btn" onclick="location.reload();"><i class="fas fa-sync-alt"></i></span></h1>
                            
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ Auth::guard('admin')->user() ? route('admin.dashboard') : route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Cost Report</li>
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
                                    <h3 class="card-title">Cost Report</h3>
                                    <a href="{{ route('report') }}" class="btn btn-primary"
                                        style="float: right; margin-right: 10px;"><i class="fa fa-backward"></i>
                                        Back</a>
                                </div>

                                <div class="card-body">
                                    <div class="col-sm-12 col-md-12 col-12">
                                        <form action="{{ route('cost-report') }}" method="post">
                                            @csrf
                                            <div class="form-group col-md-12 col-sm-12 col-12">
                                                <b>
                                                    <input type="radio" name="reports" value="dailyReports"
                                                        id="daily" required>&nbsp;&nbsp;Daily
                                                    Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="reports" value="monthlyReports"
                                                        id="monthly" required>&nbsp;&nbsp;Monthly
                                                    Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="reports" value="yearlyReports"
                                                        id="yearly" required>&nbsp;&nbsp;Yearly Reports
                                                </b>
                                            </div>

                                            <div class="d-none" id="dreports">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Start Date *</label>
                                                        <input type="text" class="form-control datepicker"
                                                            name="sdate" placeholder="DD/MM/YYYY" id="sdate"
                                                            required="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>End Date *</label>
                                                        <input type="text" class="form-control datepicker"
                                                            name="edate" placeholder="DD/MM/YYYY" id="edate"
                                                            required="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Expense Type *</label>
                                                        <select class="form-control select2" name="dvtype"
                                                            name="dvtype" style="width: 100%;">
                                                            <option value="">Select One</option>
                                                            <option value="">vbn
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <button type="submit" name="search" class="btn btn-info"
                                                            style="margin-top: 30px;"><i
                                                                class="fa fa-search-plus"></i>&nbsp;Search</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-none" id="mreports">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Month *</label>
                                                        <select class="form-control" name="month" id="month"
                                                            required="">
                                                            <option value="">Select One</option>
                                                            <option value="01">January</option>
                                                            <option value="02">February</option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Year *</label>
                                                        <select class="form-control" name="year" id="year"
                                                            required="">
                                                            <option value="">Select One</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Expense Type *</label>
                                                        <select class="form-control select2" name="mvtype"
                                                            name="mvtype" style="width: 100%;">
                                                            <option value="">Select One</option>
                                                            <option value="">xv</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <button type="submit" name="search" class="btn btn-info"
                                                            style="margin-top: 30px;"><i
                                                                class="fa fa-search-plus"></i>&nbsp;Search</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-none" id="yreports">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Year *</label>
                                                        <select class="form-control" name="ryear" id="ryear"
                                                            required="">
                                                            <option value="">Select One</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <label>Select Expense Type *</label>
                                                        <select class="form-control select2" name="yvtype"
                                                            name="yvtype" style="width: 100%;">
                                                            <option value="">Select One</option>
                                                            <option value="1">1
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-3 col-12">
                                                        <button type="submit" name="search" class="btn btn-info"
                                                            style="margin-top: 30px;"><i
                                                                class="fa fa-search-plus"></i>&nbsp;Search</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div id="print">
                                        <div class="col-sm-12 col-md-12 col-12">
                                            <div class="list-info">
                                                <h3 class="text-center">{{ $title }}</h3>
                                                <p class="text-center m-0">Expense</p>
                                            </div>
                                            <table id="example" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;">#SN.</th>
                                                        <th>Date</th>
                                                        <th>Cost Type</th>
                                                        <th>Note</th>
                                                        <th style="width: 10%;">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $sl = 0;
                                                        $tcost = 0;
                                                    @endphp
                                                    @foreach ($allCost as $cost)
                                                        <tr>
                                                            <td>{{ ++$sl }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($cost->date)->format('d/m/Y') }}
                                                                ({{ Carbon\Carbon::parse($cost->date)->dayName }})
                                                            </td>
                                                            <td>{{ $cost->category->name }}</td>
                                                            <td>{!! $cost->note !!}</td>
                                                            <td class="text-right">
                                                                {{ number_format($cost->amount, 2) }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $tcost += $cost->amount;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th colspan="4" class="text-right">Total Amount</th>
                                                    <th class="text-right">{{ number_format($tcost, 2) }}</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-12"
                                        style="text-align: center; margin-top: 20px">
                                        <a href="javascript:void(0)" onclick="printDiv('print')"
                                            class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                                    </div>
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
            $(document).ready(function() {
                $('#daily').click(function() {
                    $('#dreports').removeAttr('class', 'd-none');
                    $('#mreports').attr('class', 'd-none');
                    $('#yreports').attr('class', 'd-none');

                    $('#sdate').attr('required', 'required');
                    $('#edate').attr('required', 'required');
                    $('#dvtype').attr('required', 'required');

                    $('#month').removeAttr('required', 'required');
                    $('#year').removeAttr('required', 'required');
                    $('#mvtype').removeAttr('required', 'required');

                    $('#ryear').removeAttr('required', 'required');
                    $('#yvtype').removeAttr('required', 'required');
                });

                $('#monthly').click(function() {
                    $('#mreports').removeAttr('class', 'd-none');
                    $('#dreports').attr('class', 'd-none');
                    $('#yreports').attr('class', 'd-none');

                    $('#sdate').removeAttr('required', 'required');
                    $('#edate').removeAttr('required', 'required');
                    $('#dvtype').removeAttr('required', 'required');

                    $('#month').attr('required', 'required');
                    $('#year').attr('required', 'required');
                    $('#mvtype').attr('required', 'required');

                    $('#ryear').removeAttr('required', 'required');
                    $('#yvtype').removeAttr('required', 'required');
                });

                $('#yearly').click(function() {
                    $('#yreports').removeAttr('class', 'd-none');
                    $('#dreports').attr('class', 'd-none');
                    $('#mreports').attr('class', 'd-none');

                    $('#sdate').removeAttr('required', 'required');
                    $('#edate').removeAttr('required', 'required');
                    $('#dvtype').removeAttr('required', 'required');

                    $('#month').removeAttr('required', 'required');
                    $('#year').removeAttr('required', 'required');
                    $('#mvtype').removeAttr('required', 'required');

                    $('#ryear').attr('required', 'required');
                    $('#yvtype').attr('required', 'required');
                });
            });
        </script>
    @endsection

</x-app-layout>
