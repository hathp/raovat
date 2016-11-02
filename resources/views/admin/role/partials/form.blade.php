<div class="form-body">
    {{-- Role name --}}
    {!! FormHelper::text('Tên nhóm', 'name', null, ['input' => ['required']]) !!}

    {{-- Super admin --}}
    {!! FormHelper::checkbox('Toàn quyền truy cập', 'super_admin', 1, null, ['input' => ['default' => 0]]) !!}
    <br />

    {{-- Super admin --}}
    {!! FormHelper::checkbox('Truy cập admin', 'admin', 1, null, ['input' => ['default' => 0]]) !!}
    <br />

    {{-- Active --}}
    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]) !!}
    <hr />

    {{-- Permission group --}}
    <h4>Câp quyền cho nhóm</h4>
    @foreach($permission_groups as $permission_group)
        <div class="form-group">
            <label>{{ $permission_group->name }}</label>
            <div class="checkbox-list">
                <div class="row">
                    @foreach($permission_group->permissions as $permission)
                        <div class="col-xs-3">
                            <label>
                                {!! FormHelper::checkbox($permission->name, 'permission[]', $permission->id, isset($role) ? $role_permission : null, ['input' => ['data-group' => $permission_group->name]]) !!}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-actions">
    @include('admin.partials.form-submit-button')
</div>