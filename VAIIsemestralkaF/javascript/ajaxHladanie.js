$(document).ready(function () {
    $('#search_text').keyup(function () {
        var txt = $(this).val();
        if(txt != '')
        {
            $.ajax({
                url:"MYSQL/hladaniePrispevkuSQL.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function (data)
                {
                    $('#result').html(data);
                }
            });
        }
    });
});