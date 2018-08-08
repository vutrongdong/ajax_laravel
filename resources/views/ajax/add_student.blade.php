  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form action="{{ asset('students/store') }}" method="post" id="form_add">
          <div class="modal-body">
            {{ csrf_field() }}
            <div class="forn-group">
              <label style="color:red">Name</label>
              <input id="name" type="text" name="name" class='form-control'>
            </div>
            <p style="color:red" id="error_name"></p>
            <div class="form-group">
              <label style="color:red">Gender</label><br>
              <input  type="radio" value="Nam" name="gender" class='radio radio-inline'>Nam
              <input type="radio" value="Nữ" name="gender" class='radio radio-inline'>Nữ
              <p style="color:red" id="error_gender"></p>
            </div>
          </div>
          <div class="modal-footer">
            <input id="save_info" value="Save" type="submit" class="btn btn-success" style="float: left;" name="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>