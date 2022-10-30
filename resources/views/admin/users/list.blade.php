@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Tên Người dùng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Quyền</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>
                    @if($user->role_id = 1)
                    Khách hàng
                    @else
                    Nhân viên
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


