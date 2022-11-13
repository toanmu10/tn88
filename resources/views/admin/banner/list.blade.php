@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu Đề</th>
            <th>Đường dẫn</th>
            <th>Ảnh</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $key => $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->name }}</td>
                <td>{{ $banner->url }}</td>
                <td><a href="{{ $banner->thumb }}" target="_blank">
                        <img src="{{ $banner->thumb }}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($banner->active) !!}</td>
                <td>{{ $banner->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/banners/edit/{{ $banner->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $banner->id }}, '/admin/banners/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $banners->links() !!}
@endsection


