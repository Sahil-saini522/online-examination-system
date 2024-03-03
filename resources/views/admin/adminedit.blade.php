<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form id="addstudent" action="/subject/edit/{{$user->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control custom-class" id="subject" name="subject" value="{{$user->subject}}" placeholder="Enter your subject" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
