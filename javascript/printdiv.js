
        function printDiv(divID) 
		{
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage; 
        }
		function openNav() {
    $("#showleftmenu").css({"width":"15%","z-index":"10000","opacity":"1","float":"left" });
	$("table").css({"width":"84%","margin-left":"0px","transition": "0.5s" });
}

function closeNav() {
    $("#showleftmenu").css({"width":"0"})
	$("table").css({"width":"90%", "margin":"auto","transition": "0.5s"});
}
