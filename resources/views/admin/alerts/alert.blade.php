@if (session()->has('add'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('add') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif (session()->has('update'))
    <div class="alert alert-info" role="alert">
        {{ session()->get('update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif (session()->has('destroy'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('destroy') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif