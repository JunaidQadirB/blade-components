<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <input id="{{$name}}Input" type="hidden" name="{{$name}}">
        <trix-editor
            value="{{old($name, $value)}}"
            rows="{{@$rows??5}}" class="form-control {{$errors->has($name) ? 'is-invalid' : null}}"
            id="{{$name}}" aria-describedby="{{$name}}HelpId"
            @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
            input="{{$name}}Input"></trix-editor>


        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
