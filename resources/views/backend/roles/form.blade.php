@extends('super_admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.2/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endpush

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">
            @if (Route::currentRouteName() == 'role.edit')
                Edit
            @else
                Add
            @endif Role
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">
                @if (Route::currentRouteName() == 'role.edit')
                    Edit
                @else
                    Add
                @endif Role
            </li>

        </ol>
        <div class="card" style="max-width: 1000px; margin: auto; padding: 10px 20px;">
            <form id="roleForm" action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-12">
                        {{-- <x-form.input.text id="name" label="Name" otherattr="required" class="form-control "
                            placeholder="Role Name"
                            value="{{ isset($role->name) && $role->name != '' ? $role->name : '' }}" /> --}}
                        <div>
                            <div class="form-group">
                                <label for="name">{{ $label ?? '' }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Role Name"
                                    value="{{ isset($role->name) && $role->name != '' ? $role->name : '' }}">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style: none">
                            @foreach ($modules as $key => $module)
                                @if ($key != 0)
                                    <li>
                                        <input type="checkbox" class="form-check-input" value="{{ $module->id }}">
                                        <label>
                                            <h6> <strong>{{ $module->name }}</strong> </h5>
                                        </label>


                                        <ul style="list-style: none" class="row">
                                            @foreach ($module->permissionList as $key => $permission)
                                                <li class="col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="permissions[]"
                                                        name="permissions[]" value="{{ $permission->id }}"
                                                        @if (isset($role) &&
                                                                $role->rolePermissions()->where('permission_id', $permission->id)->exists()) )
                                checked @endif>
                                                    <label for="{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="col-md-4 text-center" style="margin: auto;"><input type="submit" class="btn btn-success"
                        value="Submit"></div>
            </form>

        </div>
    @endsection
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    @endpush
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
        <script>
            $(".select2_dd").select2({
                theme: 'bootstrap4',
            });
        </script>

        <script>
            $('input[type="checkbox"]').change(function(e) {

                var checked = $(this).prop("checked"),
                    container = $(this).parent(),
                    siblings = container.siblings();

                container.find('input[type="checkbox"]').prop({
                    indeterminate: false,
                    checked: checked
                });

                function checkSiblings(el) {

                    var parent = el.parent().parent(),
                        all = true;

                    el.siblings().each(function() {
                        let returnValue = all = ($(this).children('input[type="checkbox"]').prop("checked") ===
                            checked);
                        return returnValue;
                    });

                    if (all && checked) {

                        parent.children('input[type="checkbox"]').prop({
                            indeterminate: false,
                            checked: checked
                        });

                        checkSiblings(parent);

                    } else if (all && !checked) {

                        parent.children('input[type="checkbox"]').prop("checked", checked);
                        parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find(
                            'input[type="checkbox"]:checked').length > 0));
                        checkSiblings(parent);

                    } else {

                        el.parents("li").children('input[type="checkbox"]').prop({
                            indeterminate: true,
                            checked: false
                        });

                    }

                }

                checkSiblings(container);
            });
        </script>
    @endpush
