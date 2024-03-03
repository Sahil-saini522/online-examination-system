@extends('layout.master')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Subjects</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstu">
   Click To Add Student 
  </button>
  {{-- subject showing table --}}

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Subject Id </th>
        <th scope="col">SUbject Name</th>
        <th scope="col">Edit Subject Name</th>
        <th scope="col">Delete Subject Name</th>
      </tr>
    </thead>
    <tbody>
       @foreach($sub as $item) 
          
    
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->subject}}</td>
        <td><button class="btn btn-outline-primary editsub" data-toggle="modal" data-target="#editsubjects" data-item= "{{json_encode($item)}}"   >Edit Subject</buttom>
          
        </td> <td>  <button class="btn btn-outline-danger deletesub">Delete Subject</button> </td>
       
      </tr>
     @endforeach 
    </tbody>
  </table>
  <div class="pagination">
  {{-- {{ $data->links() }} --}}
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addstu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form id="addstudent">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control custom-class" id="subject" name="subject" placeholder="Enter your subject" required>
                  
            
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary">Add Student</button>
        </div>
      </div></form>
    </div>
  </div>
</div>
    </div>


{{-- 
edit-modal --}}


<!-- Button trigger modal -->
<div class="modal fade" id="editsubjects" tabindex="-1" role="dialog" aria-labelledby="editsubjectsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <form id="editsubject">
        @csrf
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="editsubjectsTitle">Update Subject </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="subject" class="form-label">Update Subject</label>
              <input type="hidden" id="editsubs" name="id" class="form-control">
              <input type="text" class="form-control custom-class" id="subname" name="editsubject"  required>
              
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div></form>
  </div>
</div>
</div>


  {{-- end of edit modal --}}

@endsection

@section('scripts')
<script>
  $(document).ready(function(){
  $('#addstudent').on('submit', function(e){
    e.preventDefault();
    $.ajax({
   url: '/subject',
   type:'POST',
   data: $(this).serialize(),
   success:function(response){
    $('#addstu').modal('hide');
    location.reload();
   }
    });
  });

  $('.editsub').on('click', function(){
    var item = $(this).data('item'); // Corrected line
    $('#editsubs').val(item.id);
    $('#subname').val(item.subject);
});

$('#editsubject').on('submit', function(e){
  e.preventDefault();
      var id=  $('#editsubs').val();
      $.ajax({
   url: '/subject/' + id ,
   type:'PUT',
   data: $(this).serialize(),
   success:function(response){
    $('#editsubjects').modal('hide');
    location.reload();
   }
    });



})


  });
</script>

@endsection



<style>
  @media(min-width:767px){.custom-class{
      width:500px !important;
  }}
</style>