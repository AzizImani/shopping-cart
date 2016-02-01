/**
 * Created by Aziz on 31/01/2016.
 */
(function ($) {
    $(".addPanier").on("click",function(evt){
        evt.preventDefault();
        $.getJSON($(this).attr('href'),{},function(data){
            if(data.err){
                alert(data.message);
            }else{
                $("#total").html(data.total);
                $("#count").html(data.count);
            }
        })
    });
})(jQuery);