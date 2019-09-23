<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        @foreach($options as $key => $option)
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="{{$name}}" id="{{$name}}{{$key}}"
                       value="{{$option['value']}}"
                       @if(old($name, $value) == $option['value']) checked @endif
                >
                <label class="form-check-label ml-2" for="{{$name}}{{$key}}">
                    {{$option['label']}}
                </label>
            </div>
        @endforeach
        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
