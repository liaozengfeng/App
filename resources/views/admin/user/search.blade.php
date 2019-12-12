<table class="table">
    <tr>
        <td>User ID</td>
        <td>User name</td>
        <td>User email</td>
        <td>User desc</td>
        <td>User level</td>
    </tr>
    @foreach($data as $v)
        <tr a_id="{{ $v['admin_id'] }}">
            <td>{{$v['admin_id']}}</td>
            <td>{{$v['a_name']}}</td>
            <td>{{$v['a_email']}}</td>
            <td>{{$v['a_desc']}}</td>
            <td>
                <select class="p_id">
                    @foreach($pemission as $va)
                        @if($va['p_id']==$v['p_id'])
                            <option value="{{ $va['p_id'] }}" selected>{{$va['p_name']}}</option>
                        @else
                            <option value="{{ $va['p_id'] }}">{{$va['p_name']}}</option>
                        @endif
                    @endforeach
                </select>
            </td>
        </tr>
    @endforeach
</table>
{{ $data->links() }}
