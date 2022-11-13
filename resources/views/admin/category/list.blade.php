@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('test', 'id' => $id)}}">
                    <div class="dis-none panel-search w-full p-t-10 p-b-15">
                        <div class="bor8 dis-flex p-l-15">
                        <input name="search" id="search_input" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" placeholder="Search" name="search-product" />
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit">
                                Search
                            </button>
                        </div>
    </div>
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


