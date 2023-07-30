@extends('layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Jabatan</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('job-position.create') }}" class="btn btn-primary">Jabatan Baru</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Level</th>
                                            <th>Salary</th>
                                            <th width="10"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobPositions as $position)
                                        <tr>
                                            <td>{{ $position->title }}</td>
                                            <td>{{ $position->level }}</td>
                                            <td>{{ $position->salary }}</td>
                                            <td style="white-space: nowrap">
                                                <a class="btn btn-sm btn-primary" href="{{ route('job-position.edit', ['job_position' => $position]) }}">Edit</a>
                                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteData({{$position->id}})">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <form method="post" id="form-delete">
        @method('DELETE')
        @csrf
    </form>
@endsection


@section('js')
<script>
    function deleteData(id) {
        const c = confirm("Are you sure you want to delete?")
        if (c == true) {
            $("#form-delete").prop('action', "{{ route('job-position.destroy', ['job_position' => ':id']) }}".replace(':id', id))
            $("#form-delete").submit()
        }
    }
</script>
@endsection
