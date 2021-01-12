$(document).ready(function(){


  /* map parameters */
  var wrld = {
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    regionStyle: regionStyling,
    backgroundColor: '#22313F',
    series: {
      regions: [{
        values: gbData,
        attribute: 'fill',
        scale: ['#d896ab', '#b0013a']}
               ]},
    onRegionTipShow: function(e, el, code){
      el.html('In ' + el.html()+', GB proposes ' + gbData[code] + ' products : <ul>' + getProducts(gbData[code]) + '</ul>  Click to know more');
      $(".lbl-hover").html('Hovered country value: ' + gbData[code]);
    }
  };

  /* Setting up of the map */
  if ($('#world-map').length > 0) {
    $('#world-map').vectorMap(wrld);
  }

}) // End - $(document).ready...

/* Function for showing products name*/
  function getProducts(value){
    var ret="";
    if(value>=1) ret += "<li>Matchcode</li>";
    if(value>=2) ret += "<li>ID3 Global</li>";
    if(value>=3) ret += "<li>SCV</li>";
    if(value>=4) ret += "<li>DecTech</li>";
    if(value>=5) ret += "<li>Know Your People</li>";
    
    return ret;
  }


/* Basic styling for the map */
  var regionStyling = { initial: { fill: '#5c6366' }, hover: { fill: '#B0013A' }, selected: { fill: '#B0013A' } };
/* Data that is passed to the map */
  var gbData = { 
    
    "PE": 123
    
  };