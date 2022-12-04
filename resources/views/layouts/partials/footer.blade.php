    @php
        $setting = App\Models\Setting::first();
    @endphp
    <footer class="main-footer text-center">
        <strong>Copyright &copy; {{ @$setting->copyright_year }} <a href="{{ @$setting->copyright_url }}" target="_blank">
                {{ @$setting->copyright_name }}</a> .</strong>
        All rights reserved.
    </footer>
