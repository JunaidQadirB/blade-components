<div class="row mb-3">
    <div class="col-sm-12 col-md-10">
        <h2 class="text-center"><span>{{$heading}}</span></h2>
    </div>
    <div class="col-sm-12 col-md-2 d-flex h-100 justify-content-md-start  justify-content-sm-between align-self-center">
        @if($previous)
            <a class="mr-auto btn-previous-record" href="{{route($route, $previous)}}" title="Previous">
                <i class="mdi mdi-chevron-left" aria-hidden="true"></i> Previous
            </a>&nbsp;
        @else
            <div class="mr-auto text-muted btn-previous-record" title="Previous">
                <i class="mdi mdi-chevron-left" aria-hidden="true"></i> Previous
            </div>
        @endif
        @if($next)
            <a class="ml-auto btn-next-record" href="{{route($route, $next)}}" title="Next">
                Next <i class="mdi mdi-chevron-right" aria-hidden="true"></i>
            </a>
        @else
            <div class="ml-2 text-muted btn-next-record" title="Next">Next <i class="mdi mdi-chevron-right"
                                                                              aria-hidden="true"></i>
            </div>
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
