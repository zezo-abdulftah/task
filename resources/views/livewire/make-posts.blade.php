<div>

    @if($success)
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
          success
        </div>
    @endif
    <form>


        <textarea wire:model="body" rows="2" placeholder="write something"></textarea>
        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="attachments">
            <ul>

                <li>
                    <i class="fa fa-image"></i>
                    <label class="fileContainer">
                        <input wire:model="post_image" type="file">
                    </label>
                </li>


                <li>
                    <input style="width: 100px" class="btn btn-success btn-sm btn-lg pull-right" wire:click="makePost" value="post" type="button"></button>
                </li>
            </ul>
        </div>
    </form>
</div>

