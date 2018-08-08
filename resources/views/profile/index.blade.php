@extends('layouts.app')
@section('css')
<style>
.registration{
    float:right;
    background: #cdeab9;
    border-left: red;
}
.registration h4{
    color: red;
}

.info{
    float: left;
}
</style>
@endsection
@section('content')
<div id="content" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="welcome" class="card-header">{{ ucwords(Auth::user()->name) }} -- Welcome To Profile</div>
                <div class="">

                    <div class="card-body col-md-6 info">
                        <h3 style="color: red">Thông tin cá nhân</h3><br>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <h5>Họ và Tên: {{ Auth::user()->name }}</h5>
                        </div>
                        <div class="form-group">
                            <h5>Email: {{ Auth::user()->email }}</h5>
                        </div>
                        <div class="form-group">
                            <h5>Ảnh đại diện</h5>
                            <img width="200px" src="{{ url(Auth::user()->image) }}" alt="">
                        </div>
                        <div class="form-group">
                            <h5>Giới Tính: {{ Auth::user()->gender }}</h5>
                        </div>
                        <button id="show" v-on:click="toggleshow()" class="btn btn-primary">Thay đổi thông tin cá nhân</button>
                    </div>

                    <div class="card-body col-md-6 registration" v-show="show">
                            <div>
                                <h4>Cập nhật thông tin cá nhân</h4>
                            </div>
                            <hr>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Tên: </label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Hình ảnh: </label>
                                <input id='img' type="file" name="">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Giới tính: </label>
                                <input
                                @if(Auth::user()->gender == "Nam")
                                {{ 'checked' }}
                                @endif
                                class="radio-inline" type="radio" name="gender" value="Nam">Name
                                <input                                
                                @if(Auth::user()->gender == "Nữ")
                                {{ 'checked' }}
                                @endif
                                class="radio-inline" type="radio" name="gender" value="Nữ">Nữ
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="submit" id="btn_update" class="btn btn-success btn-fill"></input>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    new Vue({
        el:"#content",
        data:{
            show: false
        },
        methods:{
            toggleshow:function(){
                return this.show = true;
            }
        }
    })
    // open update form
    jQuery(document).ready(function($) {
        $('#show').click(function(){
            $('.registration').show();
            $('#welcome').css({'textAlign':'center'});
        })
    });

    // use jquery ajax submit form
    $(document).ready(function() {
        $('#btn_update').click(function(){
            var name = $('#name').val();
            var image = $('#image').val();
            var gender = $('input[name="gender"]').val();

            $.ajax({
                type: "post",
                data: "name=" + name + "&image=" + image +"&gender=" + gender,
                url: "<?php echo url('/logout') ?>",
                success: function(data){
                    console.log(data);
                }

            })
        })
    });
</script>
@endsection
@endsection
