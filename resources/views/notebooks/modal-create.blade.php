<!-- Modal -->
<div class="modal fade" id="createJournalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Journal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/notebooks" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST')}}
                    <div class="form-group">
                        <h4>Enter a name for your new journal.</h4>
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" required>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" value ="Create Journal">
                    </div>
                </form>
            </div>
        </div>
    </div>