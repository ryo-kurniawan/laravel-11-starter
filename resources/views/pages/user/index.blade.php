@extends('layouts.app')

@section('title', 'User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">User</h2>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($users as $user)

                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td class="text-start">{{ $user['name'] }}
                                            </td>
                                            <td class="text-start">
                                                {{ $user['email'] }}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href='{{ route('user.edit', $user->id) }}'
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" class="ml-2">
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
            if (confirm('Are you sure you want to delete this user?')) {
                const formId = event.target.closest('form').id;
                document.getElementById(formId).submit();
            }
        });
    });
    </script>
@endpush
