<table class="table table-responsive" id="mosques-table">
    <thead>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($mosques as $mosque)
        <tr>
            <td>{!! $mosque->nama !!}</td>
            <td>{!! $mosque->alamat !!}</td>
            <td>{!! $mosque->latitude !!}</td>
            <td>{!! $mosque->longitude !!}</td>
            <td>
                {!! Form::open(['route' => ['mosques.destroy', $mosque->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mosques.show', [$mosque->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mosques.edit', [$mosque->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>