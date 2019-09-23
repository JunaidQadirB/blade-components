<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$prepend}}</span>
                </div>
            @endif
            <input class="form-control {{$errors->has($name) ? 'is-invalid' : null}}"
                   type="text"
                   name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
                   @if(@$pattern) pattern="{{@$pattern}}" @endif
            />
            <div class="input-group-append map-dropdown-group ">
                <button class="mapDropdown btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"
                        id="dropdownMenuButton"
                        aria-haspopup="true" aria-expanded="false"
                        title="Select from map">
                    <i class="mdi mdi-map-marker"></i>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="map-wrap">
                        <div id="map" data-keepOpenOnClick
                             style="width: 450px; height: 400px;"></div>
                    </div>
                    <div class="pull-right text-right">
                        <button id="btnCenterMarker" class="btn btn-primary btn-xs text-right">Center marker</button>
                        <button id="btnCloseMapChooser" class="btn btn-secondary btn-xs">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has($name))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>


@push('scripts')
<script src="{{asset('js/vendor/leaflet/leaflet.js')}}"></script>
<script src="{{asset('js/vendor/mapbox-gl/mapbox-gl.js')}}"></script>
<script>let accessToken = 'pk.eyJ1IjoianVuYWlkcWFkaXIiLCJhIjoiY2pramcwZTBkMWZ2aTNwcjVtbzNkNHN1diJ9.w_LIpoTEVjc6aKwuZDTjyA';
    $(function () {
        $('#btnCloseMapChooser').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(".mapDropdown").dropdown("toggle");
        });

        $('#btnCenterMarker').click(function (e) {
            e.preventDefault();
            e.stopPropagation();

            let latlng = map.getCenter();
            marker.setLatLng(latlng, {draggable: 'true'});
            recenter(map, latlng, 0, 0);
        });

        $(document).delegate(".dropdown-menu [data-keepOpenOnClick]", "click", function (e) {
            e.stopPropagation();
        });

        function recenter(map, latlng, offsetx, offsety) {
            var center = map.project(latlng);
            center = new L.point(center.x + offsetx, center.y + offsety);
            var target = map.unproject(center);
            map.panTo(target);
        }

        var defaultLatLng = [30.1798, 66.9750];
        var coordinates = $('#coordinates').val();
        var userLatlng = coordinates.split(',');
        if (userLatlng.length ==2) {
            defaultLatLng = userLatlng;
        }
        var map = L.map($('#map')[0], {
            /*renderer: L.canvas(),*/
            center: defaultLatLng,
            zoom: 13,
            preferCanvas: true
        });
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 24,
            id: 'mapbox.streets',
            accessToken: accessToken
        }).addTo(map);


        var marker = new L.marker(defaultLatLng, {draggable: 'true'});
        map.addLayer(marker);
        marker.on('dragend', function (event) {
            var marker = event.target;
            var position = marker.getLatLng();
            marker.setLatLng(new L.LatLng(position.lat, position.lng), {draggable: 'true'});
            map.panTo(new L.LatLng(position.lat, position.lng));
            $('#{{$name}}').val(`${position.lat}, ${position.lng}`);
        });


        map.on('click', function (ev) {
            var latlng = map.mouseEventToLatLng(ev.originalEvent);
            // console.log(latlng.lat + ', ' + latlng.lng);
            map.setView(latlng, 13);
        });
        map.on('moveend', function (e) {
//        // console.log(e.target.getCenter());
//        let latlng = e.target.getCenter();
//        map.setView(latlng, 5);
//        marker.setLatLng(latlng, {draggable: 'true'});
        });
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{asset('js/vendor/leaflet/leaflet.css')}}"/>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet'/>
{{--<link rel="stylesheet" href="{{asset('js/vendor/mapbox-gl/mapbox-gl.css')}}">--}}
<style>
    .map-wrap {
        max-width: 100%;
        /* border: 3px solid #000;*/
        margin: 10px;
    }

    .map-dropdown-group .dropdown-menu {
        width: 470px;
    }

</style>
@endpush
