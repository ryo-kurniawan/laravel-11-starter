@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">Edit User</h2>
                    </div>
                </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="clearfix mb-3"></div>

                            <form action="{{ route('user.update', $user->id) }}" method="post" class="needs-validation"
                            novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        autofocus
                                        placeholder="Full Name"
                                        value="{{ $user->name }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        autofocus
                                        tabindex="1"
                                        placeholder="Email"
                                        value="{{ $user->email }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg float-right">Create</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
