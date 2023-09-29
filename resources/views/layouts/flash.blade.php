<!-- Success -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    <i class="menu-icon tf-icons ti ti-checkbox"></i> {{ Session::get("success") }}
</div>
@endif
<!-- Failed -->
@if(Session::has('failed'))
<div class="alert alert-danger" role="alert">
    <i class="menu-icon tf-icons ti ti-checkbox"></i> {{ Session::get("failed") }}
</div>
@endif