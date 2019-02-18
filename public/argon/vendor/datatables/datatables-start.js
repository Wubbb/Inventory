
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
