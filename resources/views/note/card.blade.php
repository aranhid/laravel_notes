<div class="card m-3" style="width: 25%">
    <div class="card-header">
        <h5 class="card-title">
            {{ $note->title }}
        </h5>
    </div>
    <div class="card-body">
        <p class="card-text"> {{ $note->text }} </p>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <a href="{{ route('edit', ['id' => $note->id]) }}" class="btn btn-primary m-1">
                Edit
            </a>
            <form method="POST" action="{{ route('delete', ['note' => $note]) }}">
                @csrf
                <button class="btn btn-danger m-1">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
