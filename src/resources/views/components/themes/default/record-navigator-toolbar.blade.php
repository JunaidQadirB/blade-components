<div class="btn-toolbar" role="toolbar" aria-label="Record Navigator Context Toolbar">
    <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
        {{--<a href="{{route('dashboard.menus.index')}}" class="btn btn-outline-primary">Back to list</a>
        <a href="{{route('dashboard.menus.index')}}" class="btn btn-outline-primary">Back to list</a>--}}
        @if($previous)
            <a class="btn btn-outline-primary btn-previous-record" href="{{$previous}}" title = "Previous [Left Arrow Key]">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </a>
        @else
            <a class="btn btn-outline-primary text-muted btn-previous-record" title = "Previous [Left Arrow Key]">
                <i class="fa fa-chevron-left" aria-hidden="true"></i> Previous
            </a>
        @endif
        @if($next)
            <a class="btn btn-outline-primary btn-next-record" href="{{$next}}" title = "Next [Right Arrow Key]">
                Next <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        @else
            <a class="btn btn-outline-primary text-muted btn-next-record" title = "Next [Right Arrow Key]">Next
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery(document).ready(function ($) {
                $(document).on('keyup', (event) => {
                    switch (event.originalEvent.code) {
                        case 'ArrowLeft':
                            if ($('.btn-previous-record').attr('href')) {
                                window.location = $('.btn-previous-record').attr('href');
                            }
                            break;
                        case 'ArrowRight':
                                if ($('.btn-next-record').attr('href')) {
                                window.location = $('.btn-next-record').attr('href');
                            }
                            break;
                    }
                })
            });
        });
    </script>
@endpush
