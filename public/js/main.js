$(function()
   {

   		'use strict';

       // Trigger Nice Scroll Pluging

      //  $('html').niceScroll();

        // Caching The Scroll Top Element
        
        $('#basic-datatables').DataTable({});
        $('#basic-datatables_filter > label > input').attr('placeholder','إبحث هنا ...').css(('text-align','center'));
        $('#basic-datatables_filter > label ').css('width','100%');
        $('#basic-datatables_filter > label > input  ').css('margin-right','10px');   
        $('#basic-datatables_filter > label > input ').css('width','100%');
        $('#basic-datatables_filter > label > input ').css('height','2.875rem');
        $('#basic-datatables_length > label ').css('width','100%');
        $('#basic-datatables_length > label > select').css('width','100%');
        $('#basic-datatables_length > label ').addClass('rs-select2--dark rs-select2--md m-r-10 rs-select2--border');
        $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(1)').addClass("js-select2");
        $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(1)').removeClass("col-md-6").addClass('col-md-2');
        $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(1)').css('padding','0px');
        $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(2)').removeClass("col-md-6").addClass('col-md-10 p-r-20');
        $("#basic-datatables_info").css("display","none");
   }
);
