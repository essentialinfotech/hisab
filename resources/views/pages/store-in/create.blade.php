@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'Add StoreIn - ' . @$setting->title)

<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add StoreIn</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Add StoreIn</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Store Information</h3>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="#">
                                        @csrf
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                                    <label>Store Date *</label>
                                                    <input type="text" name="date" class="form-control datepicker"
                                                        value="{{ date('d/m/Y') }}" required>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                                    <label>Store Invoice Number *</label>
                                                    <input type="text" name="challan" class="form-control"
                                                        placeholder="Purchase Invoice Number" required>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-3 col-12">
                                                    <label for="customer_id">Customer</label>
                                                    <div class="input-group input-group-sm">
                                                        <select name="customer_id" class="form-control select2"
                                                            id="customer_id" style="width: 87%">
                                                            {{-- <option value="" disabled selected>Select customer *
                                                            </option> --}}
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}"
                                                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                                    {{ $customer->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-append" style="margin-left: -1px;">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm supplier_add"
                                                                data-toggle="modal"
                                                                data-target=".bs-example-modal-supplier_add"><i
                                                                    class="fa fa-plus"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-3 col-12">
                                                    <label>Select Warhouse *</label>
                                                    <select name="warhouse_id" class="form-control select2"
                                                        id="warhouse_id">
                                                        {{-- <option value="" disabled selected>Select warhouse *
                                                        </option> --}}
                                                        @foreach ($warhouses as $warhouse)
                                                            <option value="{{ $warhouse->id }}"
                                                                {{ old('warhouse_id') == $warhouse->id ? 'selected' : '' }}>
                                                                {{ $warhouse->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-3 col-12">
                                                    <label>Select Category *</label>
                                                    <select name="category_id" class="form-control select2"
                                                        id="category_id">
                                                        <option value="" disabled selected>Select Category *
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-3 col-12">
                                                    <label>Select Product *</label>
                                                    <select name="product_id" class="form-control select2"
                                                        id="product_id">

                                                    </select>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-12">
                                                    {{-- <table id="mtable" class="table table-bordered table-striped">
                                                        <thead class="btn-default">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Price</th>
                                                                <th>Total Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="mtable">

                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3" class="text-right">Total Price *</td>
                                                                <td><input type="text" class="form-control"
                                                                        name="totalPrice" id="totalPrice" required
                                                                        readonly></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-right">Paid Amount *</td>
                                                                <td><input type="text" class="form-control"
                                                                        name="Paid"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        onkeyup="calculate_remain()" id="Paid"
                                                                        required></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-right">Due Amount *</td>
                                                                <td><input type="text" class="form-control"
                                                                        name="due" id="remainging" readonly></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table> --}}

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Warhouse</th>
                                                                    <th scope="col">Categoy</th>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">QTY</th>
                                                                    <th scope="col">Unit Price (Monthly)</th>
                                                                    <th scope="col">Note</th>
                                                                    <th scope="col">Total Price(Monthly)</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="addrow" class="addrow">
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="6"></td>
                                                                    <td>
                                                                        <input type="text" name="estimated_amount"
                                                                            value="0" id="estimated_amount"
                                                                            class="form-control form-control-sm text-end estimated_amount bg-light"
                                                                            readonly>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-12"
                                                style="margin-top:20px; text-align: center;">
                                                <button type="submit" class="btn btn-info"><i
                                                        class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                                                <a href="#" class="btn btn-danger"><i
                                                        class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>








        </div>
    </main>


    @section('scripts')

        <script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{ date }}" />
        <input type="hidden" name="store_no[]" value="@{{ store_no }}" />
        <input type="hidden" name="customer_id[]" value="@{{ customer_id }}" />

        <td><input type="hidden" name="warhouse_id[]" value="@{{ warhouse_id }}">
            @{{ warhouse_name }}
        </td>
        <td><input type="hidden" name="category_id[]" value="@{{ category_id }}">
            @{{ category_name }}
        </td>
        <td><input type="hidden" name="product_id[]" value="@{{ product_id }}">
            @{{ product_name }}
        </td>
        <td><input type="number" min="1" class="form-control form-control-sm text-end store_qty" name="store_qty[]" value="1"></td>
        <td><input type="number" min="1" class="form-control form-control-sm text-end unit_price" name="unit_price[]" value=""></td>
        <td><input type="text" class="form-control form-control-sm" name="description[]"></td>
        <td><input class="form-control form-control-sm text-end monthly_price" name="monthly_price[]" value="0" readonly></td>
        <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>

    </tr>

</script>
        <script>
            $(document).ready(function() {
                $(document).on("change", "#product_id", function() {
                    var date = $('#date').val();
                    var purchase_no = $('#store_no').val();
                    var customer_id = $('#customer_id').val();
                    var warhouse_id = $('#warhouse_id').val();
                    var warhouse_name = $('#warhouse_id').find('option:selected').text();
                    var category_id = $('#category_id').val();
                    var category_name = $('#category_id').find('option:selected').text();
                    var product_id = $('#product_id').val();
                    var product_name = $('#product_id').find('option:selected').text();

                    var source = $('#document-template').html();
                    var template = Handlebars.compile(source);

                    var data = {
                        date: date,
                        purchase_no: purchase_no,
                        customer_id: customer_id,
                        warhouse_id: warhouse_id,
                        warhouse_name: warhouse_name,
                        category_id: category_id,
                        category_name: category_name,
                        product_id: product_id,
                        product_name: product_name
                    };
                    var html = template(data);
                    $("#addrow").append(html);
                });
                $(document).on('click', '.removeeventmore', function() {
                    $(this).closest('.delete_add_more_item').remove();
                    totalAmountPrice();
                });

                $(document).on('keyup click', '.unit_price,.store_qty', function() {
                    var unit_price = $(this).closest('tr').find('input.unit_price').val();
                    var qty = $(this).closest('tr').find('input.store_qty').val();
                    var total = unit_price * qty;
                    $(this).closest('tr').find('input.monthly_price').val(total);
                    totalAmountPrice();
                });

                // Calculate Sum of Amount in invoice
                function totalAmountPrice() {
                    var sum = 0;
                    $('.monthly_price').each(function() {
                        var value = $(this).val();
                        if (!isNaN(value) && value.length != 0) {
                            sum += parseFloat(value);
                        }
                        $('#estimated_amount').val(sum);
                    });
                }
            });
        </script>





        <script>
            $(function() {
                $(document).on('change', '#category_id', function() {
                    var category_id = $(this).val();

                    $.ajax({
                        url: "{{ route('get-product') }}",
                        type: "GET",
                        data: {
                            category_id: category_id,
                        },
                        success: function(data) {
                            var html = '<option value="">Select..</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v
                                    .name + '</option>';
                            });
                            $('#product_id').html(html);
                        }
                    });
                });
            });
        </script>
    @endsection

</x-app-layout>
