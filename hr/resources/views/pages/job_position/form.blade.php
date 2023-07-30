@extends('layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Jabatan</h1>
                    </div>
                    <div class="col-sm-6 text-right">

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
                            <!-- form start -->
                            <form method="post" action="{{ !empty($jobPosition) ? route('job-position.update', ['job_position' => $jobPosition]) : route('job-position.store') }}">
                                @csrf
                                @if (!empty($jobPosition))
                                @method("PUT")
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Nama Jabatan" value="{{ !empty($jobPosition) ? $jobPosition->title : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="number" name="level" min="1" max="99" class="form-control" placeholder="Level Jabatan" value="{{ !empty($jobPosition) ? $jobPosition->level : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="number" name="salary" min="1" class="form-control" placeholder="Gaji Pokok" value="{{ !empty($jobPosition) ? $jobPosition->salary : '' }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
