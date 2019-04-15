
$(document).ready(function() {
  $('#dataTable').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
}
  });
});
$(document).ready(function() {
  $('#dataTable1').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
},
dom: 'Bfrtip',
        buttons: [
        {
            extend: "print",
            customize: function(win)
            {
 
                var last = null;
                var current = null;
                var bod = [];
 
                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
 
                style.type = 'text/css';
                style.media = 'print';
 
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
 
                head.appendChild(style);
         }
      },
      'excel'
]
  });
});

$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var min = parseInt( $('#min').val(), 10 );
      var max = parseInt( $('#max').val(), 10 );
      var age = parseFloat( data[3] ) || 0; // use data for the age column

      if ( ( isNaN( min ) && isNaN( max ) ) ||
           ( isNaN( min ) && age <= max ) ||
           ( min <= age   && isNaN( max ) ) ||
           ( min <= age   && age <= max ) )
      {
          return true;
      }
      return false;
  }
);

$(document).ready(function() {
  var table = $('#techbag').DataTable( {"oLanguage": {
    "oPaginate": {
    "sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
    "sNext": '<i class="fa fa-angle-right"></i>',
    }
  },
  dom: 'Bfrtip',
        buttons: [
        {
            extend: "print",
            customize: function(win)
            {
 
                var last = null;
                var current = null;
                var bod = [];
 
                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
 
                style.type = 'text/css';
                style.media = 'print';
 
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
 
                head.appendChild(style);
         }
      },
      'excel'
]
});
   
  // Event listener to the two range filtering inputs to redraw on input
  $('#min, #max').keyup( function() {
      table.draw();
  } );
} );

// $('#techbag').dataTable({searching: false,
//   "oLanguage": {
//     "oPaginate": {
//     "sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
//     "sNext": '<i class="fa fa-angle-right"></i>',
//     }
//   }
// });