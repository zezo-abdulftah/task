<div>
    @if($success)
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            success
        </div>
    @endif
        @if($cache)
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                there is wrong
            </div>
        @endif
    @isset($posts)
        @foreach($posts as $post)


            <div class="central-meta item">

                <!-- update and delete -->
                <ul style="color:black;width: 30px" class="drops-menu">
                    <li style="color: grey" >
                        <a class="dropdown-toggle nav-link  " href="#" data-toggle="dropdown">

                        </a>
                        <div class=" dropdown-menu dropdown-menu-right ">



                            <a class="dropdown-item" wire:click="delete({{ $post->id }})" title=""> Delete </a>
                        </div>
                    </li>
                </ul>

                <!-- end update and delete -->
                <div class="user-post">

                    <div class="friend-info">


                        <figure>
                            <img src="{{asset('assets/images/users/'.$post->user->personal_photo)}}" alt="">
                        </figure>



                        <div class="friend-name">
                            <ins><a href="time-line.html" title="">{{$post->user->name}}</a></ins>
                            <span>published:{{$post->created_at}} </span>
                        </div>
                        <div class="description">

                            <p>
                                {{$post->body}}
                            </p>
                        </div>
                        <div class="post-meta">
                            @if($post->image !=null)
                                <img  src="{{asset('assets/images/posts/'.$post->image)}}" height="315" webkitallowfullscreen mozallowfullscreen allowfullscreen></img>
                            @else
                                {{''}}
                            @endif
                            <div class="we-video-info">
                                <ul>

                                    <li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="fa fa-comments-o"></i>
																<ins>{{$post->comments()->count()}}</ins>
															</span>
                                    </li>
                                    <li>
                                        <button style="{{$like==true && $post->id==$change_post ?"background-color: red" :"background-color: lavender"}}"  data-toggle="tooltip" wire:click="like({{auth()->user()->id}},{{$post->id}},{{0}})" value=""> <i style="color:gray" class="ti-heart"></i></button><ins>{{$post->comments()->count()}}</ins>
                                        <button   style="{{$dis_like==true && $post->id==$change_post ?"background-color: red" :"background-color: lavender"}}"   data-toggle="tooltip" wire:click="dislike({{auth()->user()->id}},{{$post->id}},{{1}})" value=""> <i style="color:gray" class="ti-heart-broken"></i></button><ins>{{$post->comments()->count()}}</ins>
                                    </li>


                                </ul>
                            </div>

                        </div>
                    </div>
                    <div style="ba" class="coment-area">
                        <ul class="we-comet">
                            @foreach($post->comments as $comment)
                                <li>
                                    <!-- delete comment -->
                                    <ul style="color:black;width: 30px;height: 20px;float: right" class="drops-menu">
                                        <li style="color: grey" >
                                            <a style="height: 30px" class="dropdown-toggle nav-link  " href="#" data-toggle="dropdown">

                                            </a>
                                            <div style="width: 80px;height: 45px;padding-bottom: 3px;text-align:center " class=" dropdown-menu dropdown-menu-right ">

                                                <a  class="dropdown-item"  wire:click="delete_comment({{$comment->id }})"  title=""> Delete </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <!--end delete comment -->
                                    <div class="comet-avatar">
                                        <img src="{{asset('assets/images/users/'.$comment->user->personal_photo)}}" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">{{$comment->user->name}}</a></h5>
                                            <span>1 year ago</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>{{$comment->comment}}</p>
                                    </div>

                                </li>
                            @endforeach


                            <li>
                                <a href="#" title="" class="showmore underline">more comments</a>
                            </li>
                            <li class="post-comment">

                                <div class="comet-avatar">
                                    <img src="images/resources/comet-2.jpg" alt="">
                                </div>
                                <div class="post-comt-box">
                                    <form >
                                        @csrf

                                        <textarea  wire:model="comment"placeholder="Post your comment"></textarea>
                                        @error('comment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <input style="width: 100px" class="btn btn-success btn-sm btn-lg pull-right" wire:click="makeComment({{$post->id}})" value="comment" type="button"></button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        @endforeach
    @endisset
</div>
