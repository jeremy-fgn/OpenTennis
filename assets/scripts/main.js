// var button = document.getElementById("sendToBasketButton");

// button.addEventListener(
//   "click",
//   //   function(e) {
//   //     places = [];
//   //     var items = document.getElementsByClassName("invisible-checkbox");
//   //     for (var i = 0; i < items.length; i++) {
//   //       if (items[i].checked == true) {
//   //         places.push(items[i]);
//   //       }
//   //     }
//   //     var href = $("#sendToBasketButton").attr("href");
//   //     href += "&nbTicket=" + places.length;
//   //     window.location.href = href;

//   function(e) {
//     var inputs = document.getElementsByTagName("input"); //or document.forms[0].elements;
//     var cbs = []; //will contain all checkboxes
//     var checked = []; //will contain all checked checkboxes
//     for (var i = 0; i < inputs.length; i++) {
//       if (inputs[i].type == "checkbox") {
//         cbs.push(inputs[i]);
//         if (inputs[i].checked) {
//           checked.push(inputs[i]);
//         }
//       }
//     }
//     var nbTicket = checked.length; //number of checked checkboxes
//     var href = $("#sendToBasketButton").attr("href");
//     href += "&nbTicket=" + nbTicket;
//     console.log("NB ticket = " + nbTicket);
//     window.location.href = href;

//     // window.open(
//     // 	$new_href,
//     // 	'',
//     // 	'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=900, height=600'
//     // );
//   },
//   false
// );
