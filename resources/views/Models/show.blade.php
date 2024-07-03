@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Model Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('models.index') }}">Manage Models</a></li>
                        <li class="breadcrumb-item active">Model Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Your model details display goes here -->
                            <h3>Model Details</h3>
                            <p><strong>ID:</strong> {{ $model->id }}</p>
                            <p><strong>Admin ID:</strong> {{ $model->admin_id }}</p>
                            <p><strong>File Name:</strong> {{ $model->file_name }}</p>
                            <p><strong>File Path:</strong> {{ $model->file_path }}</p>
                            <p><strong>Uploaded At:</strong> {{ $model->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
