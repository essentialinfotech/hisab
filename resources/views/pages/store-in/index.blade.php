@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'Storeses - ' . @$setting->title)

<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>StoreIn</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">StoreIn</li>
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
                                    <h3 class="card-title">StoreIn List</h3>

                                    <button type="button" class="btn btn-primary add_customer" data-toggle="modal"
                                        data-target=".bs-example-modal-add_data" style="float: right;"><i
                                            class="fa fa-plus"></i> NEW
                                        StoreIn</button>
                                </div>

                                <div class="card-body">
                                    <table id="example" class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">SN</th>
                                                <th>Product NAME</th>
                                                <th>Customer</th>
                                                <th>Warhouse</th>
                                                <th>Unit</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th style="width: 10%;">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $sl = 0 @endphp
                                            @foreach ($stores as $item)
                                                <tr>
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->customer->name }}</td>
                                                    <td>{{ $item->warhouse->name }}</td>
                                                    <td>{{ $item->unit->name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td class="d-flex">
                                                        <button type="button" class="btn btn-primary btn-xs mr-2"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $item->id }}"><i
                                                                class="fa fa-edit"></i></button>
                                                        <form action="{{ route('stores.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-xs"
                                                                onclick="return confirm('Are you sure you want to delete this Unit ?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                                {{-- Edit modal --}}
                                                <div class="modal fade" id="editModal{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Store Information </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close"><span
                                                                        aria-hidden="true">×</span></button>
                                                            </div>
                                                            <form action="{{ route('stores.update', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-12 col-sm-12 col-12 mt-3">
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text" class="form-control"
                                                                            name="name" placeholder="Product Name *"
                                                                            value="{{ $item->name }}"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Product Name *'" />
                                                                        @error('name')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <select name="customer_id"
                                                                            class="form-control select2">
                                                                            <option value="" disabled selected>
                                                                                Select customer *</option>
                                                                            @foreach ($customers as $customer)
                                                                                <option value="{{ $customer->id }}"
                                                                                    {{ $customer->id == $item->customer_id ? 'selected' : '' }}>
                                                                                    {{ $customer->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('customer_id')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <select name="warhouse_id"
                                                                            class="form-control select2">
                                                                            <option value="" disabled selected>
                                                                                Select warhouse *</option>
                                                                            @foreach ($warhouses as $warhouse)
                                                                                <option value="{{ $warhouse->id }}"
                                                                                    {{ $warhouse->id == $item->warhouse_id ? 'selected' : '' }}>
                                                                                    {{ $warhouse->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('warhouse_id')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <select name="unit_id" id="unit_id"
                                                                            class="form-control select2"
                                                                            style="width:100%">
                                                                            <option value="" disabled selected>
                                                                                Select unit *</option>
                                                                            @foreach ($units as $unit)
                                                                                <option value="{{ $unit->id }}"
                                                                                    {{ $unit->id == $item->unit_id ? 'selected' : '' }}>
                                                                                    {{ $unit->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('unit_id')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text" class="form-control"
                                                                            name="qty" placeholder="Product qty *"
                                                                            value="{{ $item->qty }}"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Product qty *'" />
                                                                        @error('qty')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text" class="form-control"
                                                                            name="container"
                                                                            value="{{ $item->container }}"
                                                                            placeholder="Product container *"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Product container *'" />
                                                                        @error('container')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="text" class="form-control"
                                                                            name="price"
                                                                            value="{{ $item->price }}"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            placeholder="Product price *"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'Product price *'" />
                                                                        @error('price')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                        <input type="tex"
                                                                            class="form-control datepicker"
                                                                            name="date" placeholder="DD/MM/YYYY *"
                                                                            value="{{ $item->date }}"
                                                                            onfocus="this.placeholder = ''"
                                                                            onblur="this.placeholder = 'DD/MM/YYYY *'" />
                                                                        @error('date')
                                                                            <div class="alert text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="far fa-save"></i>&nbsp;&nbsp;Save
                                                                        Changes</button>
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
                        <h4 class="modal-title">Store Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('stores.store') }}" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12 col-12 mt-3">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Product Name *" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Product Name *'" />
                                @error('name')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select name="customer_id" class="form-control select2">
                                    <option value="" disabled selected>Select customer *</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select name="warhouse_id" class="form-control select2">
                                    <option value="" disabled selected>Select warhouse *</option>
                                    @foreach ($warhouses as $warhouse)
                                        <option value="{{ $warhouse->id }}">{{ $warhouse->name }}</option>
                                    @endforeach
                                </select>
                                @error('warhouse_id')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select name="unit_id" id="unit_id" class="form-control select2"
                                    style="width:100%">
                                    <option value="" disabled selected>Select unit *</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="qty"
                                    onkeypress="return isNumberKey(event)" placeholder="Product qty *"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product qty *'" />
                                @error('qty')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="container"
                                    placeholder="Product container *" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Product container *'" />
                                @error('container')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="price"
                                    onkeypress="return isNumberKey(event)" placeholder="Product price *"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product price *'" />
                                @error('price')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="tex" class="form-control datepicker" name="date"
                                    placeholder="DD/MM/YYYY *" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'DD/MM/YYYY *'" />
                                @error('date')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-save"></i>&nbsp;&nbsp;StoreIn</button>
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
