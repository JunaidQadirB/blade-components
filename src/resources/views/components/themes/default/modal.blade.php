<div class="modal" id="{{$id}}" tabindex="-1" role="dialog"
     aria-labelledby="{{$id}}Title"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{@$isLarge? 'modal-lg':null}}" role="document">
        <div class="modal-content">
            @if(isset($title))
                <div class="modal-header">
                    <h5 class="modal-title ml-auto mr-auto" id="{{$id}}Title">{{$title}}</h5>
                    <button type="button" class="close" style="margin:-1rem" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="modal-body">
                {{$slot}}
            </div>
            {{@$footer}}
        </div>
    </div>
</div>
