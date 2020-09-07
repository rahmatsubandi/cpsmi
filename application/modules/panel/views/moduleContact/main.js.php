<script type="text/javascript">
  $(document).ready(function()
  {

    var _form = "form-moduleContact";

    // Handle data submit
    $("#"+ _form +" .page-action-save").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/modulecontact/ajax_save/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
          } else {
            notify(response.data, "danger");
          };
        }
      });
      return false;
    });

    // Handle closed
    $(".contact-check").on("click", function() {
      var checked = $(this).is(":checked");
      var id = $(this).attr("data-id");

      if (checked === true) {
        $(".contact-hours"+ id +"_open").val("").attr("disabled", true);
        $(".contact-hours"+ id +"_close").val("").attr("disabled", true);
      } else {
        $(".contact-hours"+ id +"_open").removeAttr("disabled");
        $(".contact-hours"+ id +"_close").removeAttr("disabled");
      };
    });

    // Handle upload
    $(".contact-img_map").change(function(){
      readUploadMultipleURL(this);
    });

  });
</script>
