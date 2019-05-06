
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
  var table = $('#techbag').DataTable( {
    "bPaginate": false,
    // {
    // "sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
    // "sNext": '<i class="fa fa-angle-right"></i>',
    // }
  
  //total
  "footerCallback": function ( row, data, start, end, display ) {
    var api = this.api(), data;

    // Remove the formatting to get integer data for summation
    var intVal = function ( i ) {
        return typeof i === 'string' ?
            i.replace(/[\$₱,]/g, '')*1 :
            typeof i === 'number' ?
                i : 0;
    };

    // Total over all pages
    total = api
        .column( 5 )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

    // Total over this page
    pageTotal = api
        .column( 5, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

    // Update footer
    $( api.column( 5 ).footer() ).html(
        '₱ '+pageTotal// +' ( $'+ total +' total)'
    );
},
//end total
//print
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
         },
         footer: true
      },
      { extend: 'excelHtml5', footer: true },
]
});

   
  // Event listener to the two range filtering inputs to redraw on input
  $('#min, #max').keyup( function() {
      table.draw();
  } );
} );

//items
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var min1 = parseInt( $('#min1').val(), 10 );
      var max1 = parseInt( $('#max1').val(), 10 );
      var age1 = parseFloat( data[6] ) || 0; // use data for the age column

      if ( ( isNaN( min1 ) && isNaN( max1 ) ) ||
           ( isNaN( min1 ) && age1 <= max1 ) ||
           ( min1 <= age1   && isNaN( max1 ) ) ||
           ( min1 <= age1   && age1 <= max1 ) )
      {
          return true;
      }
      return false;
  }
);

$(document).ready(function() {
  var table = $('#itemTable').DataTable({
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
  $('#min1, #max1').keyup( function() {
    table.draw();
} );
});


$(document).ready(function() {
  $('#dataTableusershow').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
},
"order": [[ 4, "asc" ]],
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

$(document).ready(function() {
  $('#dataTableitemmove').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
},
"order": [[ 6, "asc" ]],
"searching":   false,
  });
});

$(document).ready(function() {
  $('#dataTabledispose').DataTable({
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
         },
         exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
      }
      },
      {
        extend: 'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
      }
    },
]
  });
});
// $('#techbag').dataTable({searching: false,
//   "oLanguage": {
//     "oPaginate": {
//     "sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
//     "sNext": '<i class="fa fa-angle-right"></i>',
//     }
//   }
// });