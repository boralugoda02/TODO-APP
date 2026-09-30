@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark mb-0">
            <i class="fa-solid fa-square-plus text-primary me-2"></i>Add New Task
        </h4>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Task Title</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-pen-nib text-muted"></i></span>
                <input type="text" name="task" class="form-control border-start-0 ps-0 shadow-none" required placeholder="What needs to be done?">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label fw-semibold text-secondary">Date</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-regular fa-calendar-days text-muted"></i></span>
                    <input type="date" name="date" class="form-control border-start-0 ps-0 shadow-none" required>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Time</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-regular fa-clock text-muted"></i></span>
                    <input type="time" name="time" class="form-control border-start-0 ps-0 shadow-none" required>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary">Note (Optional)</label>
            <textarea name="note" id="editor" class="form-control" rows="4"></textarea>
        </div>

        <div class="d-flex gap-2 justify-content-end border-top pt-3">
            <a href="{{ route('tasks.index') }}" class="btn btn-light rounded-pill px-4 text-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa-solid fa-check me-1"></i> Save Task
            </button>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection