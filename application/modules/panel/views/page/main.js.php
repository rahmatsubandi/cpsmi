<script type="text/javascript">
  $(document).ready(function()
  {

    var _table = "table-page";
    var _form = "form-page";

    // Initialize DataTables: Index
    if ($("#"+ _table)[0]) {
      var table_page = $("#"+ _table).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url('panel/page/ajax_getall/') ?>",
          type: "get"
        },
        columns: [
          {
              data: "no",
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            data: "title",
            render: function(data, type, row, meta) {
              return '<a href="<?php echo base_url('page/') ?>'+ row['link'] +'" target="_blank">'+data+'</a>';
            }
          },
          { data: "visit_count" },
          { data: "comment_count" },
          {
            data: "is_comment",
            render: function(data, type, row, meta) {
              return (data == 1) ? "Yes" : "No";
            }
          },
          { data: "created_at" },
          {
            data: null,
            className: "center",
            defaultContent:
            '<div class="action">' +
              '<a href="javascript:;" class="action-edit"><i class="zmdi zmdi-edit"></i></a>' +
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

    // Handle data submit
    $("#"+ _form +" .page-action-save").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/page/ajax_save/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
            window.location.replace("<?php echo base_url('panel/page/') ?>");
          } else {
            notify(response.data, "danger");
          };
        }
      });
      return false;
    });

    // Handle data edit
    $("#"+ _table).on("click", "a.action-edit", function(e) {
      var temp = table_page.row($(this).closest('tr')).data();
      window.location = "<?php echo base_url('panel/page/update/') ?>"+ temp.id;
    });

    // Handle data delete
    $("#"+ _table).on("click", "a.action-delete", function(e) {
      e.preventDefault();
      var temp = table_page.row($(this).closest('tr')).data();

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
            url  : "<?php echo base_url('panel/page/ajax_delete/') ?>" + temp.id,
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

    // Handle upload
    $(".page-cover").change(function(){
      readUploadURL(this);
    });

    // Handle Link Based On Title
    $(".page-title").on("keyup", function() {
      var text = $(this).val().trim();
      var result = text.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
          result = result.toLowerCase();
      
      $(".page-url").val(result);
    });

  });
</script>
