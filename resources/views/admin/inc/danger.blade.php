@if(session()->has('danger_message'))
    <div class="alert alert-danger  alert-dismissible fade show">
        {{ session()->get('danger_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif
