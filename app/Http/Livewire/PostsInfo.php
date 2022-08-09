<?php

namespace App\Http\Livewire;

use App\models\Comment;
use App\models\Like;
use App\models\Post;
use App\User;
use Livewire\Component;

class PostsInfo extends Component
{
    public $success=false;
    public $cache=false;
    public  $comment,$post_id,$like=false,$dis_like=false,$change_post;

    public function render()
    {
        $posts=Post::with(['user','likes','comments'])->orderBy('id','DESC')->get();
        $posts_user=Post::with(['user','likes','comments'])->orderBy('id','DESC')->where('user_id',auth()->user()->id)->get();

        return view('livewire.posts-info',['posts'=>$posts]);
    }
    public function delete($post_id){

        try {

            $user = User::FindOrFail(auth()->user()->id);
            $delete_post= Post::FindOrFail($post_id);
            $delete_post->comments()->delete();
            $delete_post->delete();
            $this->success=true;




        }catch (Exception $ex){
            $this->cache=true;
        }

    }
    public function makeComment($post_id){
        $this->validate(['comment'=>'required']);
        try {

            $user = User::FindOrFail(auth()->user()->id);
            $user = Comment::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id,
                'comment' => $this->comment,

            ]);
            $this->success=true;
            $this->clearForm();


        }catch (Exception $ex){
            $this->cache=true;
        }
    }
    public function delete_comment($comment_id){
        try {

            $user = User::FindOrFail(auth()->user()->id);
            $delete_comment= Comment::FindOrFail($comment_id);
            $delete_comment->delete();
            $this->success=true;




        }catch (Exception $ex){
            $this->cache=true;
        }
    }
    public function like($user_id,$post_id,$value){
        try {
            $user = User::FindOrFail(auth()->user()->id);
            $like=Like::updateOrCreate([
                'post_id' => $post_id,
                'user_id' => $user_id,
                'like' => $value,
            ]);
           $this->change_post=$post_id;

            $this->like=true;


        }catch (Exception $ex){
            $this->cache=true;
        }
    }
    public function dislike($user_id,$post_id,$value){
        try {

            $user = User::FindOrFail(auth()->user()->id);
            $like=Like::updateOrCreate([
                'post_id' => $post_id,
                'user_id' => $user_id,
                'like' => $value,
            ]);
            $this->change_post=$post_id;
            $this->dis_like=true;





        }catch (Exception $ex){
            $this->cache=true;
        }
    }
    public function clearForm()
    {
        $this->comment='';

    }
}
