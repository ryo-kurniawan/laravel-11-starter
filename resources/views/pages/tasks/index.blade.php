@extends('layouts.app')

@section('title', 'Invitations')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tasks</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">Tasks</h2>
                        @if ($user->role_id == '1')
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

                        @endif
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($user->role_id == '1')
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td class="text-center">{{ $task->due_date }}</td>
                                        <td class="text-center">{{ $task->created_at }}</td>
                                        <td class="text-center">@if ($task->assignments){{ ucwords(str_replace('_', ' ', $task->assignments->status)) }}
                                            @else
                                            <p>Belum di assign</p>

                                        @endif</td>
                                        <td class="text-center">
                                            @if (!$task->assignments)
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary btn-icon mr-2">
                                                    <i class="fas fa-pencil"></i> Assign
                                                </a>
                                                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-times"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                            @else
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary btn-icon mr-2">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                    @elseif ($user->role_id == '2')
                                    @foreach ($tasks as $task)

                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td class="text-center">{{ $task->due_date }}</td>
                                        <td class="text-center">{{ $task->created_at }}</td>
                                        <td class="text-center">@if ($task->assignments){{ ucwords(str_replace('_', ' ', $task->assignments->status)) }}
                                            @else
                                            <p>Belum di assign</p>

                                        @endif</td>
                                        <td class="text-center">
                                            @if ($task->assignments)
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary btn-icon mr-2">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            @else
                                            <p>Belum di assign</p>
                                            @endif

                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif




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
            if (confirm('Are you sure you want to delete this task?')) {
                const formId = event.target.closest('form').id;
                document.getElementById(formId).submit();
            }
        });
    });
    </script>
@endpush
