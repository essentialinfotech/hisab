@php
    $setting = App\Models\Setting::first();
@endphp
@section('title', 'Settings - ' . @$setting->title)
<x-app-layout>
    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Settings</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Settings</li>
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
                                    <h3 class="card-title">Settings</h3>

                                    {{-- <button type="button" class="btn btn-primary add_customer" data-toggle="modal"
                                        data-target=".bs-example-modal-add_data" style="float: right;"><i
                                            class="fa fa-plus"></i> NEW
                                        Unit</button> --}}
                                </div>

                                <div class="card-body">
                                    <form
                                        action="{{ @$editSetting ? route('setting.update', @$editSetting->id) : route('setting.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @if (@$editSetting)
                                            @csrf
                                        @else
                                            @csrf
                                        @endif
                                        <div class="col-md-12 col-sm-12 col-12 mt-3">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" placeholder="Title *"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Title *'"
                                                            value="{{ @$editSetting->title }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="welcome_title">Welcome Title</label>
                                                        <input type="text" class="form-control" name="welcome_title"
                                                            id="welcome_title" placeholder="welcome_title *"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'welcome_title *'"
                                                            value="{{ @$editSetting->welcome_title }}" />
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12 col-12">
                                                        <label for="logo">Logo</label>
                                                        <input type="file" class="form-control d-none" name="logo"
                                                            id="logo"
                                                            onchange="document.getElementById('outputLogo{{ @$editSetting->id }}').src = window.URL.createObjectURL(this.files[0])">
                                                        <div class="align-items-center row">
                                                            <div class="col-md-12" id="logoLabel">
                                                                <label for="logo"
                                                                    class="form-control font-weight-normal">Choose Logo
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="logo">
                                                                    <img id="outputLogo{{ @$editSetting->id }}"
                                                                        class="w-50"
                                                                        src="{{ asset('uploads/' . @$editSetting->logo) }}"
                                                                        alt="{{ @$editSetting->logo }}">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12 col-12">
                                                        <label for="favicon">Favicon</label>
                                                        <input type="file" class="form-control d-none" name="favicon"
                                                            id="favicon"
                                                            onchange="document.getElementById('outputFavicon{{ @$editSetting->id }}').src = window.URL.createObjectURL(this.files[0])">
                                                        <div class="align-items-center row">
                                                            <div class="col-md-12" id="faviconLabel">
                                                                <label for="favicon"
                                                                    class="form-control font-weight-normal">Choose
                                                                    Favicon
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="favicon">
                                                                    <img id="outputFavicon{{ @$editSetting->id }}"
                                                                        class="w-50"
                                                                        src="{{ asset('uploads/' . @$editSetting->favicon) }}"
                                                                        alt="{{ @$editSetting->favicon }}">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-12">
                                                        <label for="copyright_name">Copyright Name</label>
                                                        <input type="text" class="form-control" name="copyright_name"
                                                            id="copyright_name" placeholder="copyright_name *"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'copyright_name *'"
                                                            value="{{ @$editSetting->copyright_name }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="copyright_url">Copyright URL</label>
                                                        <input type="text" class="form-control" name="copyright_url"
                                                            id="copyright_url" placeholder="copyright_url *"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'copyright_url *'"
                                                            value="{{ @$editSetting->copyright_url }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="copyright_year">Copyright Year</label>
                                                        <input type="text" class="form-control"
                                                            name="copyright_year" id="copyright_year"
                                                            placeholder="copyright_year *"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'copyright_year *'"
                                                            value="{{ @$editSetting->copyright_year }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="far fa-save mr-2"></i>
                                                {{ @$editSetting ? 'Save Changes' : 'Save' }}
                                            </button>
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
        <script type="text/javascript">
            $(function() {
                $('#logo').on('change', function() {
                    $('#logoLabel').addClass('col-md-6');
                    $('#logoLabel').removeClass('col-md-12');
                });
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $('#favicon').on('change', function() {
                    $('#faviconLabel').addClass('col-md-6');
                    $('#faviconLabel').removeClass('col-md-12');
                });
            });
        </script>
    @endsection

</x-app-layout>
