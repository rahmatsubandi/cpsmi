<script type="text/javascript">
  $(document).ready(function()
  {

    var _key = "";
    var _section = "moduleTestimonial";
    var _table = "table-moduleTestimonial";
    var _modal = "modal-form-moduleTestimonial";
    var _form = "form-moduleTestimonial";

    // Initialize DataTables: Index
    if ($("#"+ _table)[0]) {
      var table_moduleTestimonial = $("#"+ _table).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url('panel/moduletestimonial/ajax_getall/') ?>",
          type: "get"
        },
        columns: [
          {
              data: "no",
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: "creator_name" },
          { data: "job" },
          {
            data: "creator_link",
            render: function(data, type, row, meta) {
              var url = (~data.toLowerCase().search("http://") || ~data.toLowerCase().search("https://")) ? data : "http://"+ data;
              return '<a href="'+ url +'" target="_blank">'+data+'</a>';
            }
          },
          { data: "created_at" },
          {
            data: null,
            className: "center",
            defaultContent:
            '<div class="action">' +
              '<a href="javascript:;" class="action-edit" data-toggle="modal" data-target="#'+ _modal +'"><i class="zmdi zmdi-edit"></i></a>' +
              '<a href="javascript:;" class="action-delete"><i class="zmdi zmdi-delete"></i></a>' +
            '</div>'
          }
        ],
        autoWidth: !1,
        responsive: !0,
        pageLength: 15,
        language: {
          searchPlaceholder: "Search...",
          sProcessing: '<div style="text-align: center;"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>'
        },
        sDom: '<"dataTables_ct"><"dataTables__top"fb>rt<"dataTables__bottom"ip><"clear">',
        initComplete: function(a, b) {
          $(this).closest(".dataTables_wrapper").find(".dataTables__top").prepend(
            '<div class="dataTables_buttons hidden-sm-down actions">' +
              '<span class="actions__item zmdi zmdi-refresh" data-table-action="reload" title="Reload" />' +
            '</div>'
          );
        }
      });

      $(".dataTables_filter input[type=search]").focus(function() {
        $(this).closest(".dataTables_filter").addClass("dataTables_filter--toggled")
      });

      $(".dataTables_filter input[type=search]").blur(function() {
        $(this).closest(".dataTables_filter").removeClass("dataTables_filter--toggled")
      });

      $("body").on("click", "[data-table-action]", function(a) {
        a.preventDefault();
        var b = $(this).data("table-action");
        if ("reload" === b) {
          $("#"+ _table).DataTable().ajax.reload( null, false );
        };
      });
    };

    // Handle data add
    $("#"+ _section).on("click", "button.testimonial-action-add", function(e) {
      e.preventDefault();
      resetForm();
    });

    // Handle data edit
    $("#"+ _table).on("click", "a.action-edit", function(e) {
      e.preventDefault();
      var temp = table_moduleTestimonial.row($(this).closest('tr')).data();

      // Set key for update params, important!
      _key = temp.id;

      $("#"+ _form +" .testimonial-creator_name").val(temp.creator_name);
      $("#"+ _form +" .testimonial-job").val(temp.job);
      $("#"+ _form +" .testimonial-creator_link").val(temp.creator_link);
      $("#"+ _form +" .testimonial-content").val(temp.content);

      // Handle creator_photo
      var creator_photo = "<?php echo base_url() ?>"+ temp.creator_photo;
          creator_photo_render = '<img src="'+ creator_photo +'"/>';
      $("#"+ _form +" .preview-creator_photo").html(creator_photo_render);

      // Handle screenshot
      if (temp.screenshot != "") {
        var screenshot = "<?php echo base_url() ?>"+ temp.screenshot;
            screenshot_render = '<img src="'+ screenshot +'"/>';
        $("#"+ _form +" .preview-screenshot").html(screenshot_render);
      } else {
        $("#"+ _form +" .preview-screenshot").html("");
      };
    });

    // Handle data delete
    $("#"+ _table).on("click", "a.action-delete", function(e) {
      e.preventDefault();
      var temp = table_moduleTestimonial.row($(this).closest('tr')).data();

      swal({
        title: "Are you sure to delete?",
        text: "Once deleted, you will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type : "GET",
            url  : "<?php echo base_url('panel/moduletestimonial/ajax_delete/') ?>" + temp.id,
            dataType : "json",
            success: function(response) {
              if (response.status) {
                $("#"+ _table).DataTable().ajax.reload( null, false );
                notify(response.data, "success");
              } else {
                notify(response.data, "danger");
              };
            }
          });
        };
      });
    });

    // Handle data submit
    $("#"+ _modal +" .testimonial-action-save").on("click", function(e) {
      e.preventDefault();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/moduletestimonial/ajax_save/') ?>" + _key,
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            resetForm();
            $("#"+ _modal).modal("hide");
            $("#"+ _table).DataTable().ajax.reload( null, false );
            notify(response.data, "success");
          } else {
            notify(response.data, "danger");
          };
        }
      });
    });

    // Handle upload
    $(".testimonial-creator_photo").change(function(){
      readUploadInlineMultipleURL(this);
    });
    $(".testimonial-screenshot").change(function(){
      readUploadInlineMultipleURL(this);
    });

    // Handle form reset
    resetForm = () => {
      _key = "";
      $("#"+ _form).trigger("reset");
      $("#"+ _form +" .upload-preview").html("");
    };

  });
</script>
