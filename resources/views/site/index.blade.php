

@extends('layouts.site')

@section('content')


</div><!-- sidebar -->


<div class="col-lg-6">
    <div class="central-meta">
        <div class="new-postbox">
            <figure>
                <img src="{{asset('assets/images/users/'.auth()->user()->personal_photo)}}" alt="">
            </figure>

                <!-- form of the post -->
            <livewire:make-posts />




        </div>
    </div><!-- add post new box -->
    <!--start show the posts  -->

    <div class="loadMore">
        <livewire:posts-info />


    </div>
</div>

</div><!-- centerl meta -->
                      <!-- page like widget -->



@stop


