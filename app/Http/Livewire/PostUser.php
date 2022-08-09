<?php

namespace App\Http\Livewire;
use App\models\Comment;
use App\models\Like;
use App\models\Post;
use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostUser extends Component
{
    use WithFileUploads;
    public $success=false;
    public  $body,$post_image;
    public $cache=false;
    public  $bod,$post_id,$like=false,$dis_like=false,$change_post;
    public function render()
    {

        $posts_user=Post::with(['user','likes','comments'])->orderBy('id','DESC')->where('user_id',auth()->user()->id)->get();


        return view('livewire.post-user',['posts'=>$posts_user]);
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
    public function update_post($post_id){
        $this->validate(['body'=>'required']);
        try {
            $post=Post::FindOrFail($post_id);

            $filename='';
            if (!empty($this->post_image)) {
                $filename = uploadimage('posts', $this->post_image);

            }
            $user = User::FindOrFail(auth()->user()->id);
            $post->update([
                'image' => $filename,
                'body' => $this->body,

            ]);
            $this->success=true;
            $this->clearForm();



        }catch (Exception $ex){
            $this->cache=true;
        }
    }
    public function clearForm()
    {
        $this->comment='';

    }
}
