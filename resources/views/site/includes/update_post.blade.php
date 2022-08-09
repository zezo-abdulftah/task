
<div class="modal-dialog setting-area  top-areamodal posts{{$post->id}} posting" style="display: none;margin-left: 100px;z-index: 200;position:absolute;height: 500px">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons close">close</i>
            </button>
        </div>
        <div class="modal-body" style="">
            <div class="col-lg-12">
                <div class="central-meta">
                    <div class="editing-info">
                        <h5 class="f-title"><i class="ti-info-alt"></i> Update Post</h5>
                        @if($success)
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                success
                            </div>
                        @endif
                        <form>





                            <textarea wire:model="body" rows="3" ></textarea>

                            <div class="form-group">



                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit post Photo
                                    <input  wire:model="post_image" type="file"/>
                                </label>

                            </div>

                            <div class="submit-btns">

                                <input style="width: 100px" class="btn btn-success btn-sm btn-lg pull-right" wire:click="update_post({{$post->id}})" value="post" type="button"></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
