// 1 - START DROPDOWN SLIDER SCRIPTS
$(document).ready(function () {
  $(".showhide-account").click(function () {
    $(".account-content").slideToggle("fast");
    $(this).toggleClass("active");
    return false;
  });
});

$(document).ready(function () {
  $(".action-slider").click(function () {
    $("#actions-box-slider").slideToggle("fast");
    $(this).toggleClass("activated");
    return false;
  });
});
//  END ----------------------------- 1

// 2 - START LOGIN PAGE SHOW HIDE BETWEEN LOGIN AND FORGOT PASSWORD BOXES
$(document).ready(function () {
  $(".forgot-pwd").click(function () {
    $("#loginbox").hide();
    $("#forgotbox").show();
    return false;
  });
});

$(document).ready(function () {
  $(".back-login").click(function () {
    $("#loginbox").show();
    $("#forgotbox").hide();
    return false;
  });
});
// END ----------------------------- 2

// 3 - MESSAGE BOX FADING SCRIPTS
$(document).ready(function() {
	$(".close-yellow").click(function () {
		$("#message-yellow").fadeOut("slow");
	});
	$(".close-red").click(function () {
		$("#message-red").fadeOut("slow");
	});
	$(".close-blue").click(function () {
		$("#message-blue").fadeOut("slow");
	});
	$(".close-green").click(function () {
		$("#message-green").fadeOut("slow");
	});
});
// END ----------------------------- 3
 
// 6 - DYNAMIC YEAR STAMP FOR FOOTER
$('#spanYear').html(new Date().getFullYear());
// END ----------------------------- 6