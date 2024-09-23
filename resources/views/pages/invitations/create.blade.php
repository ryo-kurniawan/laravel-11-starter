@extends('layouts.app')

@section('title', 'Add Invitation')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Invitation</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">Add New Invitation</h2>
                    </div>
                </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="clearfix mb-3"></div>

                            <form action="{{ route('invitations.store') }}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Invited Email</label>
                                    <input id="email" type="email" class="form-control" name="email" autofocus placeholder="Invited Email" required>
                                </div>

                                <div class="form-group">
                                    <label for="position_id">Position</label>
                                    <select id="position_id" name="position_id" class="form-control">
                                        <option value="">Select Position</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                                        @endforeach
                                    </select>
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
