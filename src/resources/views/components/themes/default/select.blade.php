<div class="form-group row {{isset($show) && @$show==false?'d-none':null}}">
    <label for="{{@$id?$id:$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <select type="text" @if(isset($multiple) && $multiple) multiple @endif
        @if(isset($required) && $required) required @endif
                class="form-control custom-select {{$errors->has($name) ? 'is-invalid' : null}}"
                name="{{$name}}" id="{{@$id?$id:$name}}"
                aria-describedby="{{@$id?$id:$name}}HelpId">
            @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                <option value="">Select</option>
            @endif
            @foreach($options as $option)
                <option
                    @if(!isset($multiple) || (isset($multiple)&& $multiple!==true))
                    {{old($name, $value) == $option[$optionValueKey] ? 'selected' : null}}
                    @else
                    {{@in_array($option[$optionValueKey] , old($name))  || @in_array($option[$optionValueKey], $value) ? 'selected' : null}}
                    @endif
                    value="{{$option[$optionValueKey]}}"
                >
                    @if(is_array(@$optionTextKeys))
                        @php
                            $text = @$optionTextFormat
                        @endphp
                        @foreach (@$optionTextKeys as $textKey)
                            @php
                                $text = str_replace($textKey,$option[$textKey], $text)
                            @endphp
                        @endforeach
                        {{$text}}
                    @else
                        {{$option[$optionTextKey]}}
                    @endif
                </option>
            @endforeach
        </select>
        <br/>
        @if(isset($multiple) && $multiple)
            <button id="clear{{@$id?$id:$name}}Selection" class="btn btn-outline-secondary btn-sm mt-2 mb-1 btn-block">
                Clear
                Selection
            </button>
        @endif
        @if($errors->has(@$id?$id:$name))
            <small id="{{@$id?$id:$name}}Error"
                   class="form-text text-danger">{{$errors->first(@$id?$id:$name)}}</small>
        @else
            <small id="{{@$id?$id:$name}}Error"
                   class="form-text text-muted">{!! $helpText?$helpText:(@$multiple?'<span class="text-muted">Hold down Ctrl key to select multiple items</span>':'') !!}</small>
        @endif
    </div>
</div>

@if(isset($multiple) && $multiple)
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                jQuery(document).ready(function ($) {
                    $('#clear{{@$id?$id:$name}}Selection').click(function (e) {
                        $('#{{@$id?$id:$name}}').val([])
                        e.preventDefault()
                    })
                })
            })
        </script>
    @endpush
@endif
