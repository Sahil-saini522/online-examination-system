@extends('layout.master')
@section('content')
<!-- Button trigger modal -->
<div id="content" class="p-4 p-md-5 pt-5">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexam">
   Add Exam
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="addexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="addexams">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name of Exam</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Attemptation Time</label>
                    <input type="text" class="form-control" name="attempt" >
                  </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Select Time of Exam</label>
                  <input type="time" class="form-control" name="time">
                </div>
                     
                <div class="form-group">
                    <label for="exampleFormControlInput1">Select Date of Exam</label>
                    <input type="date" class="form-control" name="date" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">

                  </div>
                 <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Subject</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="sub_id">

                    <option>Select subject</option>
                  
                   @foreach($subject as $sub)
                    <option value="{{$sub->id}}">{{$sub->subject}}</option>
                    @endforeach
                     
                    </select>
                </div>
               
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Exam</button>
        </div> </form>
      </div>
    </div>
  </div>






  <div class="container">
    <h1>Exam Schedule</h1>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Exam ID</th>
            <th scope="col">Exam Name</th>
            <th scope="col">Attemptation Time</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Exam Time</th>
            <th scope="col">Exam Date</th>
            
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
           
              @foreach ($exam as $exams)
          <tr>
            <td>{{$exams->id}}</td>
            <td>{{$exams->exam_name}}</td>
            <td>{{$exams->attempt}}</td>
            <td>{{$exams->subject[0]['subject']}}</td>
            <td>{{$exams->time}}</td>
            <td>{{$exams->date}}</td>
            <td><button class="btn btn-outline-info editexamss"  data-toggle="modal" data-item="{{ json_encode($exams) }}" data-target="#editM">Edit </button> <button type="button" class="btn btn-outline-danger">Delete</button>  </td>
          </tr>
          @endforeach
                     
           
          {{-- @endif --}}
         </tbody>
      </table>
      <div class="pagination">
        {{ $subject->links() }}
        </div>
    </div>
  </div></div>
  {{-- edit -modal --}}
 
<div class="modal fade" id="editM" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="editform">
              @csrf
             
              <div class="form-group">
                  <label for="exampleFormControlInput1">Name of Exam</label>
                  <input type="text" class="form-control" id="exam_name" name="editname">
                  <input type="hidden" id="exam_id"  name="ids">
                </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Select Time of Exam</label>
                <input type="time" class="form-control" id="exam_time" name="edittime">
              </div>
                   
              <div class="form-group">
                <label for="exampleFormControlInput1">Attemptation Time</label>
                <input type="text" class="form-control" id="attemptation_time" name="attemptname">
              </div>

              <div class="form-group">
                  <label for="exampleFormControlInput1">Select Date of Exam</label>
                  <input type="date" class="form-control" name="editdate" id="date"  required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">

                </div>
               <div class="form-group">
                <label for="exampleFormControlSelect1">Select Subject</label>
                <select class="form-control"  id="subject_isd" name="sub_id">

                  <option>Select subject</option>
                
                  @foreach ($subject as $item) 
                  <option value="{{$item->id}}">{{$item->subject}}</option>
                   @endforeach 
                   
                  </select>
              </div>
             
             
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"   class="btn btn-primary">Update Exam</button>
      </div>
    </div></form>
  </div>
</div>

{{-- end of edit modal --}}
@endsection

@section('scripts')
<script>

$(document).ready(function(){

  $('#addexams').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url:'/exam',
      type:'POST',
      data:$(this).serialize(),
      success:function(response){
        $('#addexam').modal('hide');
        location.reload();
      }
    });  


  });
   


  $('.editexamss').on('click', function(){
    var itemss = $(this).data('item'); // Corrected 'item' instead of 'exams'
    $('#exam_id').val(itemss.id);
    $('#subject_isd').val(itemss.subject_id);  
    $('#exam_name').val(itemss.exam_name);
    $('#attemptation_time').val(itemss.attempt);
    $('#exam_time').val(itemss.time);
    $('#date').val(itemss.date);
});
   
  
  $('#editform').on('submit', function(e){
    e.preventDefault();
    var id= $('#exam_id').val();
  

    $.ajax({
          url: '/exam/' + id ,
          type:'PUT',
          data: $(this).serialize(),
          success: function(response){
            $('#editM').modal('hide');
             location.reload();
          }


    });


  });

   

});

</script>
@endsection