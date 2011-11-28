$(document).ready(function(){
    var typebtn = $("#search_type")
    var typelist = $("#typelist")
    var checked = $("#checked")
    var option = $("#option")
    var typeitem = $("#typelist li")
    typebtn.click(function(event){
        typelist.slideDown('fast')
        event.stopPropagation()
    })
    $("body").click(function(){
        typelist.slideUp('fast')
    })
    typeitem.click(function(){
        option.text($(this).text())
        checked.val($(this).text())
    })
})
