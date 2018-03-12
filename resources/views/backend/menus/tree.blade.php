
<script type="text/javascript">
  var updateMenu = function(e)
    {
        var out = $(e.target).nestable('serialize');
        out     = JSON.stringify(out);

        var formData = new FormData();
        formData.append('tree', out);


        var href  = $('.nav-tabs li.active a').prop("href");
        var id    = $('.nav-tabs li.active').data("id");

        var url   = href+'/'+id;

        $.ajax( {
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success:function (data, textStatus, jqXHR)
            {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    }; 

    
   $('.dd').nestable().on('change', updateMenu);
</script>
<div class="dd" id="nestable">
  <ol class="dd-list">
     @each('backend.menus.nesting', $items, 'item', 'backend.menus.nothing')
  </ol>  
</div>