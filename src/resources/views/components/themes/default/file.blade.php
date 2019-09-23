<div class="form-group mb-3 row {{@$isImage ? 'mb-0' : ''}}">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="input-group-prepend">
                    @if($prepend != strip_tags($prepend))
                        {!! $prepend !!}
                    @else
                        <span class="input-group-text">{{$prepend}}</span>
                    @endif
                </div>
            @endif
            <input class="form-control pb-5 {{$errors->has($name) ? 'is-invalid' : null}}"
                   type="file"
                   name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
            />
            @if(isset($append) && strlen(trim($append)) > 0)
                <div class="input-group-append">
                    @if($append != strip_tags($append))
                        {!! $append !!}
                    @else
                        <span class="input-group-text">{{$append}}</span>
                    @endif
                </div>
            @endif
        </div>
        @if(@$isImage)
            <div class="form-control text-center border-top-0" style="height: 150px">
                <img class="align-self-center ml-auto mr-auto"
                     id="{{$name}}Preview" height="100px"
                     src=""/>
            </div>
        @endif
        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
    {{--<div class="col-sm-2 p-2">
        <img id="{{$name}}Preview" class="img-thumbnail d-block ml-auto mr-auto "
             alt="" width="150px" src="{{@$preview}}"/>
    </div>--}}
</div>
@if(@$isImage)
    {{--    <div class="form-group row mb-4">
            <div class="col-sm-6"></div>
            <div class="col-sm-6 d-flex text-center">
                <img class="align-self-center ml-auto mr-auto"
                     id="{{$name}}Preview" height="100px"
                     src=""/>
            </div>
        </div>--}}

    @push('scripts')
    <script>
        (function () {
            $ = jQuery;
            function setPreview(file) {
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {

                    let src = e.target.result;
                    $('#{{$name}}Preview').attr('src', src);
                };
                reader.readAsDataURL(file);
            }

            @if($value)
            $('#{{$name}}Preview').attr('src', "{{$value}}");
            @endif

            $("#{{$name}}:file").change(function () {
                var file = this.files[0];
                setPreview(file);
            });
        })();
    </script>
    @endpush
@endif
