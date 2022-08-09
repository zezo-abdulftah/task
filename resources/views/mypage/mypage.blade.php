@extends('layouts.site')



@include('site.includes.photo')



@section('content')


</div><!-- sidebar -->


<div class="col-lg-6">
    <div class="central-meta">
        <div class="new-postbox">
            <figure>
              <img alt="" src="{{ auth()->user()->personal_photo ==''? asset('cover.jpg') : asset('assets/images/users/'.auth()->user()->personal_photo)}}">

            </figure>
            <div class="newpst-input">
                <!-- form of the post -->
                <livewire:make-posts />
            </div>
        </div>
    </div><!-- add post new box -->
    <!--start show the posts  -->

    <div class="loadMore">
        <livewire:post-user />

        </div>
    </div>

</div><!-- centerl meta -->
<!-- page like widget -->


@stop


@section('scripts')

<script>
    $(document).on('click', '#update_post', function () {
        $('.posts' +$(this).attr('post_id')).css("display", "block");
    });


    $(document).on('click', '#personal', function () {
        $('.personal' ).css("display", "block");
    });
    $(document).on('click', '#cover', function () {
        $('.cover' ).css("display", "block");
    });
    $(document).on('click', '.close', function () {

        $('.personal').css("display", "none");
        $('.cover').css("display", "none");
        $('.posting').css("display", "none");



    });



    /*
    $(document).on('click','#btn_comment',function (e){
        e.preventDefault();
        var formDta=new FormData($('#formComment')[0]);
        $.ajax({
            type:'post',
            enctype:'multipart/form-data',
            url:"",
            data: formDta,
            processData:false,
            contentType:false,
            cache:false,
            success:function(data) {
if (data.statues==true)
    location.reload();
            }
        });
    });
    */




</script>
    @stop


