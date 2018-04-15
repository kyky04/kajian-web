<table class="table table-responsive" id="jadwals-table">
    <thead>
        <th>Jadwal</th>
        <th>Tempat</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($jadwals as $jadwal)
        <tr>
            <td>{!! $jadwal->jadwal !!}</td>
            <td>{!! $jadwal->tempat !!}</td>
            <td>
                {!! Form::open(['route' => ['jadwals.destroy', $jadwal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jadwals.show', [$jadwal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jadwals.edit', [$jadwal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>