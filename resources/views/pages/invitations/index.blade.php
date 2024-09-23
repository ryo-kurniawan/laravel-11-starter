@extends('layouts.app')

@section('title', 'Invitations')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Invitations</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">Invitations</h2>
                <a href="{{ route('invitations.create') }}" class="btn btn-primary">Add Invitation</a>
                    </div>
                </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-bordered table">
                                    <tr class="text-center">
                                        <th style="width: 5%">No</th>
                                        <th>Company</th>
                                        <th>Invited Email</th>
                                        <th>Invited By</th>
                                        <th>Status</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($invitations as $invitation)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td class="text-start">{{ $company->name }}</td>
                                            <td>{{ $invitation->email }}</td>
                                            <td>{{ $invitation->inviter->name }}</td>
                                            <td>{{ ucfirst($invitation->status) }}</td>
                                            <td>{{ $invitation->position ? $invitation->position->name : 'N/A' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">

                                                    <form id="delete-form-{{ $invitation->id }}" action="{{ route('invitations.destroy', $invitation->id) }}" method="POST" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.confirm-delete').forEach(button => {
        button.addEventListener('click', function (event) {
            if (confirm('Are you sure you want to delete this position?')) {
                const formId = event.target.closest('form').id;
                document.getElementById(formId).submit();
            }
        });
    });
    </script>
@endpush
