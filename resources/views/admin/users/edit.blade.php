@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Tên người dùng</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                               placeholder="Nhập tên người dùng">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Mật khẩu Người dùng</label>
                        <input type="text" name="password" value="{{ $user->password }}" class="form-control"  placeholder="Nhập password">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                               placeholder="Nhập email người dùng">
                    </div>
                </div>
                
                <div class="form-group">
                <label>Quyền</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="3" type="radio" id="active" name="active"
                        {{ $user->role_id == 3 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Khách hàng</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $user->role_id == 2 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Nhân viên bán hàng</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $user->role_id == 1 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Nhân viên kho</label>
                </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
