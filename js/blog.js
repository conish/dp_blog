/* 
 
 */


$(function(){
    //load script on dom load event
    
    $("span.menu,ul.menu_content").mouseover(function(){$("ul.menu_content").show()});
    $("span.menu,ul.menu_content").mouseout(function(){$("ul.menu_content").hide()});
    
    
    $("#login").click(function(event){
        event.preventDefault();
        $(".zaslepka").show();
        $( "#login_dialog" ).dialog({ 
            close: function() {$(".zaslepka").hide();},
        });
    });
    $("#register").click(function(event){
        event.preventDefault();
        $(".zaslepka").show();
        $( "#register_dialog" ).dialog({ 
            close: function() {$(".zaslepka").hide();},
        });
    });
});