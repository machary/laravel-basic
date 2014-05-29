$(function() {
   /* $("#datatables").dataTable({
        "bProcessing": true,
        "sAjaxSource": "cmos/response"
    }); */

    $(".rslides").responsiveSlides();


//====================================================================
//################### GOOGLE MAP API #################################
//====================================================================
var map;

function drawMarker(){
    var infowindow = new google.maps.InfoWindow();
    $.ajax({
        url:'peta/response',
        type: "GET",
        data: "json",
        success: function (data) {
            var marker;
            if(marker==null){
                for (var i = 0; i < data.length; i++) {
                    //================================= INFO WINDOW ===================
                    //Content structure of info Window for the Markers
                    var content = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">'+ data[i].title + '</h1>'+
                        '<div id="bodyContent">'+
                        '<p>'+ data[i].info +'</p>'+
                        '</div>'+
                        '</div>';
                    //================================= MARKER ===================
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(data[i].lat,data[i].long),
                        map: map,
                        title: data[i].title,
                        animation: google.maps.Animation.DROP
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, content) {
                        return function() {
                            infowindow.setContent(content);
                            infowindow.open(map, marker);
                        }
                    })(marker, content));
                } //loop ends
            }
        }
    });

}

function drawMap(){

    var options = {
        center:new google.maps.LatLng(-3.5,113),
        zoom:6,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        panControl: false,
        zoomControl: false,
        scaleControl: true,
        streetViewControl: false

    };
    map=new google.maps.Map(document.getElementById("map"),options);
}

function longLatHover(){
    //================================= GET LONG LAT ===================
    google.maps.event.addListener(map,'click',function(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('long').value = event.latLng.lng();
    });

    google.maps.event.addListener(map,'mousemove',function(event) {
        document.getElementById('latspan').innerHTML = event.latLng.lat();
        document.getElementById('longspan').innerHTML = event.latLng.lng();
    });
}

function initialize()
{
    drawMap();
    drawMarker();
    longLatHover();
}

google.maps.event.addDomListener(window, 'load', initialize);

    $('form#coordinate').submit(function(event){
        event.preventDefault();
        var datastring = $("form#coordinate").serialize();
        $.ajax({
            url:'peta/simpan',
            type: "POST",
            data: datastring,
            dataType: "json",
            complete: function (data) {
                $('#coordinate').each(function(){
                    this.reset();
                });
                drawMarker();
            }
        });
    });
});






