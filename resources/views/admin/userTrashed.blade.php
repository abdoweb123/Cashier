@extends('authAdmin.layout')


@section('title')
    عرض العملاء المحذوفين
@endsection




@section('content')

    <div class="container">

     <div class="div-table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الإسم</th>
                <th scope="col">البريد الإلكتروني</th>
                <th scope="col">الهاتف</th>
                <th scope="col">العنوان</th>
                <th scope="col">الإعدادات</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                @if(count($user) == false)
                    <div class="alert alert-danger">

                        {{__('لا يوجد مستخدمين لعرضهم')}}
                    </div>
                @endif
                @foreach($user as $item)
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->price }} Pound</td>
                    <td>
                        <div class="row" style="width:400px">
                            <div class="col-sm">
                                <a href="{{route("users.back.from.trash", $item->id)}}" class="btn btn-success">Restore</a>
                            </div>
                            <div class="col-sm">

                                <form class="d-inline-block" action="{{route("users.delete_from.database", $item->id)}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-danger confirm_deleteForever">Delete forever</button>
                                </form>

                            </div>
                        </div>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
     </div>
    {!! $user->links() !!}     <!-- عشان يعرض عدد معين من الصفوف في الصفحة الواحدة -->
    </div>
@endsection

