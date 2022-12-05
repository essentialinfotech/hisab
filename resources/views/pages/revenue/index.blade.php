@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'All Revenue - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>All Revenue</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Revenue</li>
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
                                    <h3 class="card-title">Revenue List</h3>

                                    <button type="button" class="btn btn-primary add_customer" data-toggle="modal"
                                        data-target=".bs-example-modal-add_data" style="float: right;"><i
                                            class="fa fa-plus"></i> New
                                        Revenue</button>
                                </div>

                                <div class="card-body">
                                    <table id="example" class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">SN</th>
                                                <th>DATE</th>
                                                <th>CATEGORY</th>
                                                <th>NOTE</th>
                                                <th>AMOUNT</th>
                                                <th style="width: 10%;">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $sl = 0 @endphp
                                            @foreach ($all_revenue as $item)
                                                <tr>
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }} ({{ Carbon\Carbon::parse($item->date)->dayName }})</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->note }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td class="d-flex">
                                                        <button type="button" class="btn btn-primary btn-xs mr-2"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $item->id }}"><i
                                                                class="fa fa-edit"></i></button>
                                                        <form action="{{ route('revenue.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-xs"
                                                                onclick="return confirm('Are you sure you want to delete this Revenue ?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                                {{-- Edit modal --}}
                                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Revenue </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close"><span
                                                                        aria-hidden="true">×</span></button>
                                                            </div>
                                                            <form action="{{ route('revenue.update', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-12 col-sm-12 col-12 mt-3">

                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <select name="revenue_category_id"
                                                                            class="form-control select2"
                                                                            style="width: 100%" required>
                                                                            <option value="">Select Category..
                                                                            </option>
                                                                            @foreach ($revenue_categories as $revenue_category)
                                                                                <option value="{{ $revenue_category->id }}"
                                                                                    {{ $item->revenue_category_id == $revenue_category->id ? 'selected' : '' }}>
                                                                                    {{ $revenue_category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text" class="form-control"
                                                                            name="amount"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            minlength="1" placeholder="Amount *"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Amount *'"
                                                                            value="{{ $item->amount }}">
                                                                        @error('amount')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text"
                                                                            class="form-control datepicker"
                                                                            name="date"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            minlength="1" placeholder="DD/MM/YYYY"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'DD/MM/YYYY'"
                                                                            value="{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}">
                                                                        @error('date')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <textarea class="form-control" name="note" placeholder="Note" onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Note'">{!! $item->note !!}</textarea>
                                                                        @error('note')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal"><i
                                                                            class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade bs-example-modal-add_data" data-backdrop="static" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Revenue</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('revenue.store') }}" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12 col-12 mt-3">

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select name="revenue_category_id" class="form-control select2" style="width: 100%"
                                    required>
                                    <option value="">Select Category..</option>
                                    @foreach ($revenue_categories as $revenue_category)
                                        <option value="{{ $revenue_category->id }}">{{ $revenue_category->name }}</option>
                                    @endforeach
                                </select>
                                @error('revenue_category_id')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="amount"
                                    onkeypress="return isNumberKey(event)" minlength="1" placeholder="Amount *"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Amount *'">
                                @error('amount')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control datepicker" name="date"
                                    onkeypress="return isNumberKey(event)" minlength="1" placeholder="DD/MM/YYYY"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'DD/MM/YYYY'">
                                @error('date')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="note" placeholder="Note *" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Note *'"></textarea>
                                @error('note')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    @section('scripts')

    @endsection

</x-app-layout>
