
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
  
$('#locatio').on( 'change', function () {
  table
      .columns( 0 )
      .search( this.value )
      .draw();
} );

$('#displa').change(function() {
  if(this.checked) {
  table
      .columns( 3 )
      .search( this.value )
      .draw();
  }else{
    table
      .columns( 3 )
      .search( "" )
      .draw();
  }
} );
   
} );
//endtechbag


//start items


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
},"ordering": false,
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
  columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
}
},
{
extend: 'excelHtml5',
exportOptions: {
  columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
}
},
]
  });
  $('#organ').on( 'change', function () {
    table
        .columns( 2 )
        .search( this.value )
        .draw();
} );
$('#locat').on( 'change', function () {
  table
      .columns( 5 )
      .search( this.value )
      .draw();
} );
$('#sorc').on( 'change', function () {
  table
      .columns( 6 )
      .search( this.value )
      .draw();
} );
//keyup
$('#disp').change(function() {
  if(this.checked) {
  table
      .columns( 8 )
      .search( this.value )
      .draw();
  }else{
    table
      .columns( 8 )
      .search( "" )
      .draw();
  }
} );
});
//enditem

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
"order": [[ 5, "asc" ]],
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
          columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        }
      },
      {
        extend: 'excelHtml5',
        exportOptions: {
          columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        }
        },
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

//rhucomputer
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var min2 = parseInt( $('#min2').val(), 10 );
      var max2 = parseInt( $('#max2').val(), 10 );
      var age2 = parseFloat( data[13] ) || 0; // use data for the age column

      if ( ( isNaN( min2 ) && isNaN( max2 ) ) ||
           ( isNaN( min2 ) && age2 <= max2 ) ||
           ( min2 <= age2   && isNaN( max2 ) ) ||
           ( min2 <= age2   && age2 <= max2 ) )
      {
          return true;
      }
      return false;
  }
);

$(document).ready(function() {
  var table = $('#rhucomputer').DataTable({
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
  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
}
},
{
extend: 'excelHtml5',
exportOptions: {
  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
}
},
]
  });
  $('#min2, #max2').keyup( function() {
    table.draw();
} );
});
//endrhucomputer

//assignitem
$(document).ready(function() {
  $('#assign').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
},
"ordering": false,
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
//endassignitem

$(document).ready(function() {
  var table = $('#dataitenera').DataTable({
    //"pagingType": "full_numbers", //This is to show First and Last Button
	  "oLanguage": {
"oPaginate": {
"sPrevious": '<i class="fa fa-angle-left"></i>', // This is the link to the previous page
"sNext": '<i class="fa fa-angle-right"></i>', // This is the link to the next page
//"sFirst": "<<", // This is the link to the First page.
//"sLast": ">>", //This is the link to the Last page.
}
},"ordering": false,
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
  $('#loca').on( 'change', function () {
    table
        .columns( 0 )
        .search( this.value )
        .draw();
} );
});