@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Tên Người dùng</th>
            <th>Email</th>
            <th>Quyền</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role_id = 3)
                    Khách hàng
                    @elseif($user->role_id = 2)
                    Nhân viên bán hàng
                    @elseif($user->role_id = 1)
                    Nhân viên kho
                    @else
                    Admin
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">

    </div>
@endsection


