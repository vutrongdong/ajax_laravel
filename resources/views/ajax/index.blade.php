@extends('layouts.app')
@section('content')
@include('ajax.add_student')
@include('ajax.update_students')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p id="msg"></p>
                    Dashboard
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"> Add Students</button>
                    <button id="read_data" style="float: right;" type="submit" class="btn btn-info pull-right">Load data by ajax</button>
                </div>
                <div id="body" class="card-body">
                    @include('ajax.student_page')
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    $(document).ready(function() {
        // $('.pagination a').on('click',function(e))
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('?')[1];
            readPage(page);
        })

        function readPage(page){
            $.ajax({
                url: '/students/page/ajax?'+ page,
            }).done(function(data){
                $('#body').html(data);
                location.hash = page;
            });
        }
    });
     //-----------add student-------------------
     $(document).ready(function() {

        //------------valide---------

        //------------add-----------
        $("#form_add").on('submit',function(e){
            $('#form_add #error_name').empty();
            $('#form_add #error_gender').empty();
    //preven ngăn chặn việc load lại trang
    e.preventDefault()      
    var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');
    $.ajax({
        type: post,
        url: url,
        data: data,
        dataTy: 'json',
        success:function(data){
            console.log(data);
            if($.isEmptyObject(data.error_name||data.error_gender)){
                $.get('read_data',function(data){
                    $('#student_info').html(data);
                    $('#msg').show();
                    $('#msg').fadeOut(2000);
                    $("#msg").html('<p id="msg" class="alert alert-success">thêm thành công</p>');
                    $("#form_add #name").val('');
                })
            }else{
                $('#form_add #error_name').text(data.error_name);
                $('#form_add #error_gender').text(data.error_gender);
            }
        }
    })
})
        //-----------------load data info students------------------
    });
     $(document).ready(function() {
        $.get("{{ URL::to('students/read_data') }}",function(data){
            $('#student_info').html(data);
        })
    });

    //-------------------delete students----------------
    $(document).on('click','#delete',function(e){
        var id = $(this).data('id');
        $.get('{{ URL::to("students/destroy") }}',{id:id},function(data){
            $("#student_info tr#"+ id).remove();
            $('#msg').show();
            $('#msg').fadeOut(2000);
            $("#msg").html('<p class="alert alert-success">xóa thành công</p>');
        });
    });
    //-----------------edit students-----------
    
    $(document).on('click','#edit',function(e){
        var id= $(this).data('id');
        $.get('{{ URL::to('students/edit') }}',{id:id},function(data){
            $("#form_update #name").val(data.name);
            $("#form_update #id").val(data.id);
            $('#student_update').modal('show');
            if(data.gender=="Nam"){
                $("#form_update #nu").removeAttr('checked');
                $("#form_update #nam").attr('checked','checked');
            }
            if(data.gender=="Nữ"){
                $("#form_update #nam").removeAttr('checked');
                $("#form_update #nu").attr('checked','checked');
            }
        })
        
    });
    // ---------------update student--------------
    $(document).ready(function() {
        $('#msg').hide();
        $('#form_update').on('submit',function(e){
            var id = $(this).data('id');
            e.preventDefault();
            var data= $(this).serialize();
            var url = $(this).attr('action');
            var post = $(this).attr('method');
            $.ajax({
                type: post,
                url: url,
                data: data,
                success:function(data){
                    console.log(data);
                    $('#msg').show();
                    $('#msg').fadeOut(2000);
                    $("#msg").html('<p id="msg" class="alert alert-success">cập nhật thành công</p>');
                    $.get('read_data',function(data){
                        $('#student_info').html(data);
                    })

                }

            })

        })
    });
</script>
@endsection
@endsection