@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Model</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('models.index') }}">Manage Models</a></li>
                        <li class="breadcrumb-item active">Create New Model</li>
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
                            <!-- Form to create a new model -->
                            <form method="POST" action="{{ route('models.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="admin_id">Admin ID</label>
                                    <select id="admin_id" name="admin_id" class="form-control @error('admin_id') is-invalid @enderror" required>
                                        <option value="">Select Admin</option>
                                        @foreach($admins as $admin)
                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('admin_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file_name">File Name</label>
                                    <input type="text" id="file_name" name="file_name" class="form-control @error('file_name') is-invalid @enderror" required>
                                    @error('file_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file_path">File Path</label>
                                    <input type="text" id="file_path" name="file_path" class="form-control @error('file_path') is-invalid @enderror" required>
                                    @error('file_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save Model</button>
                                <a href="{{ route('models.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Custom styles to enhance visibility */
    .form-control {
        color: #000000; /* Ensure input text is black */
    }
    .form-control::placeholder {
        color: #6c757d; /* Placeholder text color */
    }
    .form-control:focus {
        color: #000000; /* Focused input text color */
    }
    .form-control option {
        color: #000000; /* Ensure select option text is black */
    }
</style>
@endsection
