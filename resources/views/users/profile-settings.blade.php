@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Profile Settings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Profile</li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="m-3">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
</div>

<x-error-message textColor="text-white" />

<section class="section">
    <div class="row g-4">
        
        <!-- SECTION 1: Personal Information -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fs-6 fw-bold">
                        <i class="bi bi-person-gear text-primary me-2"></i>Personal Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- SECTION 2: Password Update -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fs-6 fw-bold">
                        <i class="bi bi-shield-lock text-primary me-2"></i>Update Password
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-repeat me-1"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- SECTION 3: ID Document Verification -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fs-6 fw-bold">
                        <i class="bi bi-card-heading text-primary me-2"></i>ID Document Verification
                    </h5>
                </div>
                <div class="card-body">

                    @if(auth()->user()->document && auth()->user()->document->status === 'approved')
                        
                        <!-- DISPLAYED WHEN APPROVED -->
                        <div class="py-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center bg-success-subtle text-success rounded-circle mb-3" style="width: 80px; height: 80px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                                </svg>
                            </div>
                            <h4 class="fw-bold text-success mb-1">Identity Verified</h4>
                            <p class="text-muted mb-3" style="max-width: 480px; margin: 0 auto;">
                                Your government-issued ID documents have been reviewed and approved. Your identity verification is complete.
                            </p>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                <i class="bi bi-shield-check me-1"></i> Verified on {{ auth()->user()->document->updated_at->format('M d, Y') }}
                            </span>
                        </div>

                    @else

                        <!-- DISPLAYED WHEN NOT YET APPROVED / PENDING / NOT SUBMITTED -->
                        @if(auth()->user()->document && auth()->user()->document->status === 'pending')
                            <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                                <i class="bi bi-clock-history fs-4 me-3"></i>
                                <div>
                                    <strong>Under Review:</strong> Your uploaded documents are currently being processed by our verification team. You can re-upload below if needed.
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('user.documents.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <!-- Front Side Upload -->
                                <div class="col-md-6">
                                    <label for="id_front" class="form-label fw-semibold">ID Document (Front)</label>
                                    <div class="p-3 border rounded text-center bg-light">
                                        <i class="bi bi-card-image display-6 text-muted mb-2 d-block"></i>
                                        <input class="form-control" type="file" id="id_front" name="id_front" accept="image/*,.pdf" required>
                                        <small class="text-muted mt-1 d-block">Supported formats: JPG, PNG, PDF (Max 5MB)</small>
                                    </div>
                                </div>

                                <!-- Back Side Upload -->
                                <div class="col-md-6">
                                    <label for="id_back" class="form-label fw-semibold">ID Document (Back)</label>
                                    <div class="p-3 border rounded text-center bg-light">
                                        <i class="bi bi-card-image display-6 text-muted mb-2 d-block"></i>
                                        <input class="form-control" type="file" id="id_back" name="id_back" accept="image/*,.pdf" required>
                                        <small class="text-muted mt-1 d-block">Supported formats: JPG, PNG, PDF (Max 5MB)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload me-1"></i> Upload Documents
                                </button>
                            </div>
                        </form>

                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection