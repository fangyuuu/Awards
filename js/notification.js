// DO NOT EDIT THIS FILE! - TT
$(document).ready(function() {

	getNotifications();
	// Get notifications every 5s
	setInterval("getNotifications()", 5000);

});

// Get notifications 
// To reuse this function for trainer and admin, update the code in "../functions/doGetNotifications.php"
function getNotifications() {
	
	if (!$("#notification_button").hasClass("open")) {
		var list = document.getElementById("notification_list");

		var count = $("#notification_list li").length -1; // dont count first element

		while (count > 0) {  
		    $('#notification_list').children().last().remove();
		    count--;
		} 

		$.ajax({
	        url: "../Functions/doGetNotifications.php",
	        type: 'POST',
	        dataType: "json",
	        async: false,
	        success: function (data) {

	            if (data.length !== 0){

	            	for (i=0;i<data.length;i++) {

	            		//"<li><a href=\"#\">$notifications[$x]</a></li>"
	            		var li = document.createElement("li");
	            		var a = document.createElement("a");

	            		var msg = document.createTextNode(data[i]["msg"]);
					    a.appendChild(msg);
					    a.setAttribute("href",data[i]["link"]);
					    li.appendChild(a);

					    li.setAttribute("id",data[i]["noti_id"]);

					    document.getElementById("notification_list").appendChild(li);

					    if (i != data.length - 1) {
					    	//"<li role=\"separator\" class=\"divider\"></li>";
					    	var li = document.createElement("li");

						    li.setAttribute("role","separator");
						    li.className = "divider"; 

						    document.getElementById("notification_list").appendChild(li);

					    }
	            	}

	            	document.getElementById("icon-count").setAttribute("data-count",data.length);
	            } else {
	                document.getElementById("icon-count").setAttribute("data-count","0");
	            }

	            document.getElementById("noti_count").innerHTML = "You have <strong>" + data.length + "</strong> notifications!";
	        },
	        error: function(xhr, ajaxOptions, thrownError){  // error handling
//	            alert(xhr.status);
//	            alert(thrownError);
	        }
	    });
	}

}

// Updates the status of the notifications to "Seen"
function hasSeen() {

	// this function is called before this element opens
	if (!$("#notification_button").hasClass("open")) {

		var excludedLI = new Array("l","0","noti_count");
		var notificationList = new Array();

		var list = document.getElementById('notification_list');
	    for(i = 0; i < list.childNodes.length; i++){
	        childLI = list.childNodes[i];
	        if(childLI.nodeName == "LI" && excludedLI.indexOf(childLI.id) == -1){
	            notificationList.push(childLI.id);
	        }
	    }

	    if (notificationList.length != 0) {
	    	$.ajax({
		        url: "../Functions/doUpdateNotification.php",
		        type: 'POST',
		        data: {'notificationList' : notificationList},
		        async: false,
		        error: function(xhr, ajaxOptions, thrownError){  // error handling
//		            alert(xhr.status);
//		            alert(thrownError);
		        }
		    });
	    }
	} else {
		getNotifications();
	}
	
}