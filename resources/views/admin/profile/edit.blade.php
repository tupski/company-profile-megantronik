@extends('layouts.admin')

@section('title', 'Edit Profile')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- Profile Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Update your account's profile information and email address.</p>
                    
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    
                    <form method="post" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('patch')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-muted">
                                        Your email address is unverified.
                                        
                                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                                            Click here to re-send the verification email.
                                        </button>
                                    </p>
                                    
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="alert alert-success mt-2">
                                            A new verification link has been sent to your email address.
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" value="{{ ucfirst($user->role) }}" disabled>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success d-inline-block ms-3 mb-0 py-2">
                                    Saved successfully!
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Update Password -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Ensure your account is using a long, random password to stay secure.</p>
                    
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="current_password" name="current_password" required>
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="password" name="password" required>
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                            
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success d-inline-block ms-3 mb-0 py-2">
                                    Password updated!
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Delete Account -->
            <div class="card shadow border-danger">
                <div class="card-header py-3 bg-danger text-white">
                    <h6 class="m-0 font-weight-bold">Delete Account</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                    
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        Delete Account
                    </button>
                    
                    <!-- Delete Account Modal -->
                    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ route('admin.profile.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                                        
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" id="password" name="password" placeholder="Enter your password to confirm" required>
                                            @error('password', 'userDeletion')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
