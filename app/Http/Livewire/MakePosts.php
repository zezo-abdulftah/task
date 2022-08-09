<?php

namespace App\Http\Livewire;

use App\models\Post;
use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class MakePosts extends Component
{
    use WithFileUploads;
    public $success=false;
    public  $body,$post_image;
    public function render()
    {
        return view('livewire.make-posts');
    }

    public function makePost(){
        $this->validate(['body'=>'required']);
        try {
            $filename='';
            if (!empty($this->post_image)) {
                $filename = uploadimage('posts', $this->post_image);

            }
            $user = User::FindOrFail(auth()->user()->id);
            $user = Post::create([
                'image' => $filename,
                'user_id' => auth()->user()->id,
                'body' => $this->body,

            ]);
            $this->success=true;
            $this->clearForm();


        }catch (Exception $ex){
            return redirect()->back();
        }

    }

    public function clearForm()
    {
    $this->body='';
    $this->post_image='';
    }

}
