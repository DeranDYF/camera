<!-- Success -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    <i class="menu-icon tf-icons ti ti-checkbox"></i> {{ Session::get("success") }}
</div>
@endif