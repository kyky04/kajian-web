<table class="table table-responsive" id="kajians-table">
    <thead>
        <th>Mesjid</th>
        <th>Pemateri</th>
        <th>Tema</th>
        <th>Hari</th>
        <th>Waktu Kajian</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($kajians as $kajian)
        <tr>
            <td>{!! $kajian->mosque->nama !!}</td>
            <td>{!! $kajian->pemateri !!}</td>
            <td>{!! $kajian->tema !!}</td>
            <td>{!! $kajian->waktu !!}</td>
            <td>{!! $kajian->waktu_kajian !!}</td>
            <td>
                {!! Form::open(['route' => ['kajians.destroy', $kajian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kajians.show', [$kajian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kajians.edit', [$kajian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>