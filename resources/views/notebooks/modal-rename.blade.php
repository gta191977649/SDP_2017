<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rename Journal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pb-2">Renaming journal <i>'{{ $notebook->name }}'</i>.</div>
                <form action="{{ route('notebooks.update',$notebook->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">New Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $notebook->name }}" required>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value ="Save changes">
                    </div>
                </form>
            </div>
        </div>
    </div>