$(document).ready(function(){
    $(".btn-minus").on("click",function(){
        var now = $("input.valueqty").val();
        if ($.isNumeric(now)){
            if (parseInt(now) -1 > 0){ now--;}
            $("input.valueqty").val(now);
        }else{
            $("input.valueqty").val("1");
        }
    })            
    $(".btn-plus").on("click",function(){
        var now = $("input.valueqty").val();
        if ($.isNumeric(now)){
            $("input.valueqty").val(parseInt(now)+1);
        }else{
            $("input.valueqty").val("1");
        }
    })                        
}) 