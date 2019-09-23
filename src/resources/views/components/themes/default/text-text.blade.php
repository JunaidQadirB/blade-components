<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            <select type="text" class="form-control custom-select {{$errors->has($name) ? 'is-invalid' : null}}"
                    name="{{$name}}" id="{{$name}}"
                    aria-describedby="{{$name}}HelpId">
                <option value="">Select</option>
                @foreach($options as $option)
                    <option
                            {{old($name, $value) == $option[$optionValueKey] ? 'selected' : null}}
                            value="{{$option[$optionValueKey]}}"
                    >{{$option[$optionTextKey]}}</option>
                @endforeach
            </select>
            <span class="pl-1 pr-1 pt-2">&ndash;</span>
            <select type="text"
                    class="form-control custom-select {{$errors->has($name) || $errors->has($selectName)  ? 'is-invalid' : null}}"
                    name="{{$selectName}}" id="{{$selectName}}"
                    aria-describedby="{{$selectName}}HelpId">
                <option value="">Select</option>
                @foreach($options as $option)
                    <option
                            {{old($selectName, $selectValue) == $option[$optionValueKey] ? 'selected' : null}}
                            value="{{$option[$optionValueKey]}}"
                    >{{$option[$optionTextKey]}}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has($name))
            <small id="{{$name}}"
                   class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
