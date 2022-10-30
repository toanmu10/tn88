@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::category($categories) !!}
        </tbody>
    </table>
    <div>
    {!! $categories->links() !!}
    </div>
@endsection


