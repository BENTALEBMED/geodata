(function () {
  
   var center=[ -5.63265170,32.15448530];
  var view = new ol.View({
    projection:'EPSG:4326',
    center: center,
    zoom: 9,
 });


  var map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Group({
        
        title: 'Fonds',
       
        layers: [
          
          new ol.layer.Tile({ 
            title: 'OSM',
            type: 'base',
            visible: true,
            source: new ol.source.OSM()
          }),

          new ol.layer.Tile({
            title: 'Satellite',
            type: 'base',
            visible: false,
              source: new ol.source.BingMaps({
                imagerySet: 'AerialWithLabelsOnDemand',
                key: 'Amxf2FPCC_mzx5m7Hv_NJwDtnxwaoNENaNSY3iNsAnP4F_b2x0u4y_crJC1eA6xI',
              })
            }),
        
        ]
      }),  // ======== FIN GROUP DES FONDS 

          //==================== GROUP DES COUCHES DES PROJETS AIT MELLOUL =====================//
          new ol.layer.Vector({
            title: 'LES DOUARS',
            style: new ol.style.Style({
              image: new ol.style.Icon({
                src: 'OPENLAYER/Images/MARKER.png'
              })
            }),
            source: new ol.source.Vector({
               url: "OPENLAYER/data/DOUARS.geojson",
               format: new ol.format.GeoJSON() 
            })
          })
      
    ],// ==============   FIN LAYERS MAP =================//


    view:view,

  }); // FIN MAP

  

  var layerSwitcher = new ol.control.LayerSwitcher({
    tipLabel: 'Légende', // Optional label for button
    groupSelectStyle: 'children' // Can be 'children' [default], 'group' or 'none'
  });
  map.addControl(layerSwitcher);

  
 // var code = document.getElementById('code_projet').value;
  // alert(code);

  
  var container = document.getElementById('popup');
  var content_element = document.getElementById('popup-content');
  var closer = document.getElementById('popup-closer');

closer.onclick = function() {
  overlay.setPosition(undefined);
  closer.blur();
  return false;
};
var overlay = new ol.Overlay({
  element: container,
  autoPan: true,
  offset: [0, -10]
});
map.addOverlay(overlay);

var fullscreen = new ol.control.FullScreen();
map.addControl(fullscreen);

map.on('click', function(evt){
  var feature = map.forEachFeatureAtPixel(evt.pixel,
    function(feature, layer) {
      return feature;
    });
  if (feature) {
      var geometry = feature.getGeometry();
      var coord = geometry.getCoordinates();
      
      var content = '<h4><b><u>PROVINCE</u></b> :' + feature.get('PROVINCE') + '</h4>';
      content += '<h4><b><u>CERCLE</u></b> :' + feature.get('CERCLE') + '</h4>';
      content += '<h4><b><u>COMMUNE</u></b> :' + feature.get('COMMUNE') + '</h4>';
      content += '<h4><b><u>DOUAR</u></b> :' + feature.get('DOUAR') + '</h4>';
      content_element.innerHTML = content;
      overlay.setPosition(coord);
      
      console.info(feature.getProperties());
  }
});


let long = document.getElementById('long').value;
let lat= document.getElementById('lat').value;

let zoom=document.querySelector('#zoom')
//let zoomc=document.querySelector('#zoomc')


/*search.onclick=function() {
  alert('test');
 // view.animate({zoom: 20}, {center:[parseFloat(long),parseFloat(lat)]});
};*/

zoom.onclick = function() {
  view.animate({zoom: 20}, {center:[parseFloat(long),parseFloat(lat)]});
};


/*var zoomc=document.getElementById('zoomc');
  zoomc.onclick = function() {
    view.animate({zoom: 14}, {center:[parseFloat(long),parseFloat(lat)]});
  };*/
  

//zoom.removeEventListener('click',function(){ view.animate({zoom: 20}, {center:[parseFloat(long),parseFloat(lat)]})});
//zoomc.addEventListener('click',function(event){ event.preventDefault();event.stopPropagation(); view.animate({zoom: 14}, {center:[parseFloat(long),parseFloat(lat)]})},false);
//zoom.addEventListener('click',function(event){  event.stopPropagation(); view.animate({zoom: 19}, {center:[parseFloat(long),parseFloat(lat)]})},false);

  //zoomc.onclick=function() {
    //alert('test');
    //view.animate({zoom: 14}, {center:[parseFloat(long),parseFloat(lat)]});
  //};


})();

/*function onClick1(id, callback) {
  document.getElementById(id).addEventListener('click', callback);
}*/




 // ============================== ZOOMER SUR UN PROJET ============================//

 
/*function flyTo(location, done) {
  var duration = 2000;
  var zoom = 3;
  var parts = 2;
  var called = false;
  function callback(complete) {
    --parts;
    if (called) {
      return;
    }
    if (parts === 0 || !complete) {
      called = true;
      done(complete);
    }
  }
  ol.view.animate(
    {
      center: location,
      duration: duration,
    },
    callback
  );
  ol.view.animate(
    {
      zoom: zoom - 1,
      duration: duration / 2,
    },
    {
      zoom: zoom,
      duration: duration / 2,
    },
    callback
  );
}*/


/*onClick('search', function () {
 flyTo(loc, function () {});
});*/





