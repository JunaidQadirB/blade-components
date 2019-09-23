<div class="form-group row">
    <label for="{{isset($id)?$id:$name}}"
           class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group flatpickr">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="input-group-prepend">
                    @if($prepend != strip_tags($prepend))
                        {!! $prepend !!}
                    @else
                        <span class="input-group-text">{{$prepend}}</span>
                    @endif
                </div>
            @endif
            <input data-input class="form-control  {{$errors->has($name) ? 'is-invalid' : null}}"
                   type="{{@$type?:'text'}}"
                   name="{{$name}}" id="{{isset($id)?$id:$name}}" aria-describedby="{{isset($id)?$id:$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
                   @if(@$pattern) pattern="{{@$pattern}}" @endif
                   @if($type == 'number') step="{{@$step?:1}}" @endif
                   @if($type == 'number') min="{{@$min?:0}}" @endif
                   @if($type == 'number' && isset($max)) max="{{@$max}}" @endif
            />
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary" title="Toggle" data-toggle>
                    <i class="fas fa-calendar"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="Clear" data-clear>
                    <i class="fas fa-times  "></i>
                </button>
            </div>
            {{-- <flat-pickr class="form-control {{$errors->has($name) ? 'is-invalid' : null}}"
                         name="{{$name}}" id="{{isset($id)?$id:$name}}" aria-describedby="{{isset($id)?$id:$name}}HelpId"
                         value="{{old($name, $value)}}"
                         :config="{
                                     wrap: true,
                                     altFormat: 'F j, Y  @ h:i K',
                                     altInput: true,
                                     dateFormat: 'Y-m-d H:i:S',
                                     enableTime: true,
                                     enableSeconds:true,
                                 }"></flat-pickr>--}}

        </div>

        @if($errors->has($name))
            <small id="{{isset($id)?$id:$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{isset($id)?$id:$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(($) => {
            flatpickr("#{{$name}}", {
                wrap: false,
                altFormat: '{{@$config['altFormat'] ? @$config['altFormat'] : 'F j, Y '}}',
                altInput: true,
                dateFormat: '{{ @$config['dateFormat'] ? @$config['dateFormat'] : 'Y-m-d H:i:S' }}',
                enableTime: {{@$config['enableTime']?$config['enableTime']:'false'}},
                enableSeconds: false,
            });
        })
        //'F j, Y  @ h:i K'
    </script>
@endpush
