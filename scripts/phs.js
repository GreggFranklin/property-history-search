var scripturl="https://bdap-media.s3.amazonaws.com/js/bfreport_widget_20110407.js";

$.getScript(scripturl).done(function(script,textStatus){
//    widgetstyles();
  }).fail(function(jqxhr,settings,exception){
//    alert("script load fail: "+exception);
  });


function BFWidgetCallback( response ){
  var bfAddress = $( response['content'] ).find( "#bfaddress" ).text();
  var topHtml = '<h2>No results found.<\/h2>' +
                '<p style="line-height:120%;">Looks like the address you have requested is <strong>out of coverage<\/strong>. Please try searching for another address. If you have further questions, please contact us at <strong>support@buildfax.com<\/strong>.<\/p>';
  var botHtml = "";
  if( response['permitCount'] > 0 ){
    topHtml = '<h2>' + response['permitCount'] + ' Permits Found!<\/h2>' +
              '<p style="font-size: 12px; line-height:120%;">We found <strong>' + response['permitCount'] +
              ' PERMITS<\/strong> for ' + bfAddress +
              '. The information found could be critical to your decision-making process, ' +
              'as it includes risk- and value-related items.<\/p>'
    botHtml = '<h2 class="buyLink"><a href="' + 'http://www.google.com' + '">Click to Buy Your BuildFax Report Now!<\/a><\/h2>';
  }
  $("#bfoverlay_topcontent").html( topHtml );
  $("#bfoverlay_bottomcontent").html( botHtml );
  $("#bfoverlay_contact").hide();

  $("#bfoverlay").overlay({ 
   top: 100,
   mask: {
      color: '#666',
      loadSpeed: 30,
      opacity: 0.5
    },
    closeOnClick: true
  });
  $("#bfoverlay").data('overlay').load();
}

var bf = [];
    bf['host'] = 'https://delivery.buildfax.com';
    bf['pid'] = 'BF71a30abb-f1ad-9957-62f7-4dbed8aeca3e';
    bf['key'] = 'uetAKs7FsDvExUNr'; 
    bf['source'] = 'searchbox';
    bf['target'] = 'inline';
    bf['show'] = 'all';
    bf['callback'] = 'BFWidgetCallback';
    bf['outputParams']  = {
        'verbose': 1
};