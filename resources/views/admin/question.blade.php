@extends('layout.master')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Subjects</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addquestion">
   Click To Add Question
  </button>
  {{-- subject showing table --}}

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Question Id </th>
        <th scope="col">Question Name</th>
        <th scope="col">Edit Question Name</th>
        <th scope="col">Delete Question Name</th>
        
      </tr>
    </thead>
    <tbody>
       @foreach($questions as $ques) 
          
    
      <tr>
        <th scope="row">{{$ques->id}}</th>
        <td>{{$ques->question}}</td>
        <td><button class="btn btn-outline-primary editquest" data-toggle="modal" data-target="#editquestion" data-item= "{{json_encode($ques)}}"   >Edit Subject</buttom>
          
        </td> <td>  <button class="btn btn-outline-danger deletesub">Delete Subject</button> </td>
       
      </tr>
     @endforeach 
    </tbody>
  </table>
  <div class="pagination">
  {{-- {{ $data->links() }} --}}
  </div>


  {{-- end of table --}}

<!-- Modal -->
<div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="addques">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="optionA" class="form-label">Option A</label>
              <input type="text" class="form-control" id="optionA" name="opta" placeholder="Enter Option A" required>
            </div>
            <div class="form-group col-md-6">
              <label for="optionB" class="form-label">Option B</label>
              <input type="text" class="form-control" id="optionB" name="optb" placeholder="Enter Option B" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="optionC" class="form-label">Option C</label>
              <input type="text" class="form-control" id="optionC" name="optc" placeholder="Enter Option C" required>
            </div>
            <div class="form-group col-md-6">
              <label for="optionD" class="form-label">Option D</label>
              <input type="text" class="form-control" id="optionD" name="optd" placeholder="Enter Option D" required>
            </div>
          </div>
          <div class="form-group">
            <label for="correctAnswer" class="form-label">Correct Answer</label>
            <select class="form-control" id="correctAnswer" name="correctans" required>
              <option value="A">Option A</option>
              <option value="B">Option B</option>
              <option value="C">Option C</option>
              <option value="D">Option D</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Question</button>
        </div>
      </div>
    </form>
  </div>
</div>

    <style>
        @media(min-width:767px){.custom-class{
            width:500px !important;
        }}
      </style>

{{-- 
edit-modal --}}


<!-- Button trigger modal -->
<div class="modal fade" id="editquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="editques">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="question" class="form-label">Question</label>
            <input type="hidden" id="editisd" name="id">
            <input type="text" class="form-control" id="editquestions" name="editquestion" placeholder="Enter Question" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="optionA" class="form-label">Option A</label>
              <input type="text" class="form-control" id="editopta" name="editoptas" placeholder="Enter Option A" required>
            </div>
            <div class="form-group col-md-6">
              <label for="optionB" class="form-label">Option B</label>
              <input type="text" class="form-control" id="editoptb" name="editoptbs" placeholder="Enter Option B" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="optionC" class="form-label">Option C</label>
              <input type="text" class="form-control" id="editoptc" name="editoptcs" placeholder="Enter Option C" required>
            </div>
            <div class="form-group col-md-6">
              <label for="optionD" class="form-label">Option D</label>
              <input type="text" class="form-control" id="editoptd" name="editoptds" placeholder="Enter Option D" required>
            </div>
          </div>
          <div class="form-group">
            <label for="correctAnswer" class="form-label">Correct Answer</label>
            <select class="form-control" id="editcorrectans" name="editcorrectans" required>
              <option value="A">Option A</option>
              <option value="B">Option B</option>
              <option value="C">Option C</option>
              <option value="D">Option D</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Question</button>
        </div>
      </div>
    </form>
  </div>
</div>


  {{-- end of edit modal --}}

@endsection


@section('scripts')

<script>
    $(document).ready(function(){
    $('#addques').on('submit', function(e){
      e.preventDefault();
      $.ajax({
     url: '/question',
     type:'POST',
     data: $(this).serialize(),
     success:function(response){
      $('#addquestion').modal('hide');
      location.reload();
     }
      });
    });
           
    $('.editquest').on('click' , function(){
       var data= $(this).data('item');
       $('#editisd').val(data.id);
      $('#editquestions').val(data.question);
      $('#editopta').val(data.opta);
      $('#editoptb').val(data.optb);
      $('#editoptc').val(data.optc);
      $('#editoptd').val(data.optd);
      $('#editcorrectans').val(data.correctans);

    });

    $('#editques').on('submit', function(e){
    e.preventDefault(); 
    var id = $('#editisd').val();
    $.ajax({
        url: '/question/' + id , // Update the URL to match the new route format
        type: 'PUT',
        data: $(this).serialize(),
        success: function(response){
            $('#editquestion').modal('hide');
            location.reload();
        }
    });
});
});

    </script>
@endsection