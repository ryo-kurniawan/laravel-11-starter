@extends('layouts.app')

@section('title', 'Detail Task')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Task</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h2 class="section-title">Assignment Task</h2>
                    </div>
                </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="clearfix mb-3"></div>

                            <form action="{{ $task->assignments ? route('tasks.update', $task->id) : route('tasks.assign', $task->id) }}" method="post" class="needs-validation"
                            novalidate="">
                                @csrf
                                @if ($task->assignments)
                                @method('PUT')
                                @endif

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" readonly required>{{ $task->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" readonly required>
                                </div>

                                @if (!$task->assignments)
                                <div class="form-group">
                                    <label for="user">Assign To</label>
                                    <select name="user" id="user" class="form-control" required>
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg float-right">Assign</button>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="user">Assigned To</label>
                                    <input type="text" class="form-control" id="user" name="user" value="{{ $getAssignmentUser->user->name }}" readonly required>
                                </div>
                                @endif
                                @if ($task->assignments)
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status"
    value="{{ ucwords(str_replace('_', ' ', $task->assignments->status)) }}" readonly required>
                                </div>
                                @if (Auth::user()->id == $task->assignments->user_id)
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg float-right">Update Status</button>
                                </div>
                                @endif
                                @endif

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
