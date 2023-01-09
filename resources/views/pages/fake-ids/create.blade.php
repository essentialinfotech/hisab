@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'Create Fake ID - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Create Fake ID</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"> Create Fake ID</li>
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
                                    <h3 class="card-title"> Create Fake ID</h3>

                                    <a href="{{ route('fake-ids.index') }}" class="btn btn-info btn-sm float-right">
                                        <i class="fa fa-plus"></i> Fake ID List
                                    </a>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('fake-ids.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nid_no">NID No</label>
                                                    <input type="text" name="nid_no" class="form-control"
                                                        placeholder="NID No">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="father_name">Father Name</label>
                                                    <input type="text" name="father_name" class="form-control"
                                                        placeholder="Father Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mother_name">Mother Name</label>
                                                    <input type="text" name="mother_name" class="form-control"
                                                        placeholder="Mother Name">
                                                </div>
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
                    </div>
                </div>
            </section>
        </div>
    </main>


    @section('scripts')

    @endsection

</x-app-layout>
