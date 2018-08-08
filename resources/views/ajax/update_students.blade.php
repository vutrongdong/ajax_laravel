  <!-- Modal -->
  <div class="modal fade" id="student_update" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form action="{{ URL::to('students/update') }}" method="post" id="form_update">
          <div class="modal-body">
            {{ csrf_field() }}
            <div class="forn-group">
              <input type="hidden" name="id" id="id" class="form-control">
              <label style="color:red">Name</label>
              <input   id="name" type="text" name="name" class='form-control'>
            </div><br>
            <div class="forn-group">
              <label id="sex" style="color:red">Gender</label><br>
              <input id='nam' type="radio" value="Nam" name="gender" class='radio radio-inline'>Nam
              <input id="nu" type="radio" value="Nữ" name="gender" class='radio radio-inline'>Nữ
            </div>
          </div>
          <div class="modal-footer">
            <input id="update" value="Update" type="submit" class="btn btn-success" style="float: left;" name="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>