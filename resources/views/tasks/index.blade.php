@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-secondary mb-0"><i class="fa-solid fa-tasks me-2"></i>My Tasks</h3>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Task
        </a>
    </div>

    <div class="list-group gap-3">
        @forelse($tasks as $taskItem)
            <div class="list-group-item border-0 shadow-sm rounded-4 p-3 d-flex justify-content-between align-items-start {{ $taskItem->is_completed ? 'bg-light opacity-75' : 'bg-white' }}" style="border-left: 6px solid {{ $taskItem->is_completed ? '#198754' : '#0d6efd' }} !important;">
                <div class="ms-2 me-auto">
                    <div class="fw-bold fs-5 {{ $taskItem->is_completed ? 'text-decoration-line-through text-muted' : 'text-dark' }}">
                        {{ $taskItem->task }}
                    </div>
                    <div class="mt-1 text-muted small">
                        <span class="badge bg-light text-dark border me-2"><i class="fa-regular fa-calendar me-1 text-primary"></i> {{ $taskItem->date }}</span>
                        <span class="badge bg-light text-dark border"><i class="fa-regular fa-clock me-1 text-warning"></i> {{ $taskItem->time }}</span>
                    </div>
                    
                    @if($taskItem->note)
                        <div class="mt-3 p-3 bg-light border-0 rounded-3 text-secondary">
                            {!! $taskItem->note !!}
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2 ms-3 align-items-center">
                    <form action="{{ route('tasks.complete', $taskItem->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $taskItem->is_completed ? 'btn-outline-warning' : 'btn-success' }} rounded-pill px-3">
                            <i class="fa-solid {{ $taskItem->is_completed ? 'fa-rotate-left' : 'fa-check' }}"></i>
                        </button>
                    </form>

                    <a href="{{ route('tasks.edit', $taskItem->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="openDeleteModal({{ $taskItem->id }})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="fa-solid fa-clipboard-list text-muted fa-4x mb-3"></i>
                <h5 class="text-muted">No tasks available. Add a new task to get started!</h5>
            </div>
        @endforelse
    </div>

    <dialog id="deleteModal" class="p-4 rounded-4 border-0 shadow-lg" style="max-width: 400px; width: 90%;">
        <div class="text-center">
            <i class="fa-solid fa-triangle-exclamation text-danger fa-3x mb-3"></i>
            <h4 class="fw-bold text-dark mb-2">Are you sure?</h4>
            <p class="text-muted mb-4">Do you really want to delete this task?</p>
            
            <div class="d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4" onclick="closeDeleteModal()">Cancel</button>
                
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4">Yes, Delete</button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        const modal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');

        function openDeleteModal(taskId) {
            deleteForm.action = '/tasks/' + taskId;
            modal.showModal();
        }

        function closeDeleteModal() {
            modal.close();
        }
    </script>
@endsection