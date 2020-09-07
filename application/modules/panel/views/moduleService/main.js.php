<script type="text/javascript">
  $(document).ready(function()
  {

    var _key = "";
    var _section = "moduleService";
    var _table = "table-moduleService";
    var _modal = "modal-form-moduleService";
    var _form = "form-moduleService";

    var _backgroundColorLists = [{
      id: 0,
      text: '#fceef3',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #fceef3;"></div> #fceef3</div>'
    },{
      id: 1,
      text: '#fff0da',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #fff0da;"></div> #fff0da</div>'
    },{
      id: 2,
      text: '#e6fdfc',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #e6fdfc;"></div> #e6fdfc</div>'
    },{
      id: 3,
      text: '#eafde7',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #eafde7;"></div> #eafde7</div>'
    },{
      id: 4,
      text: '#e1eeff',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #e1eeff;"></div> #e1eeff</div>'
    },{
      id: 5,
      text: '#ecebff',
      html: '<div style="display: flex;"><div class="box-color-bordered" style="background: #ecebff;"></div> #ecebff</div>'
    }];

    // Initialize DataTables: Index
    if ($("#"+ _table)[0]) {
      var table_moduleService = $("#"+ _table).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url('panel/moduleservice/ajax_getall/') ?>",
          type: "get"
        },
        columns: [
          {
              data: "no",
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: "name" },
          { data: "icon" },
          { data: "background_color" },
          { data: "icon_color" },
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
    $("#"+ _section).on("click", "button.service-action-add", function(e) {
      e.preventDefault();
      resetForm();
    });

    // Handle data edit
    $("#"+ _table).on("click", "a.action-edit", function(e) {
      e.preventDefault();
      resetForm();
      
      var temp = table_moduleService.row($(this).closest('tr')).data();

      // Set key for update params, important!
      _key = temp.id;

      $("#"+ _form +" .service-name").val(temp.name);
      $("#"+ _form +" .service-icon").val(temp.icon);
      $("#"+ _form +" .service-background_color").val(temp.background_color);
      $("#"+ _form +" .service-icon_color").val(temp.icon_color);
      $("#"+ _form +" .service-description").val(temp.description.replace(/<br\s*[\/]?>/gi, "\r\n"));

      // Handle textarea height
      setTimeout(function() {
        $("#"+ _form +" .service-description").height($("#"+ _form +" .service-description")[0].scrollHeight);
      }, 500);
    });

    // Handle data delete
    $("#"+ _table).on("click", "a.action-delete", function(e) {
      e.preventDefault();
      var temp = table_moduleService.row($(this).closest('tr')).data();

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
            url  : "<?php echo base_url('panel/moduleservice/ajax_delete/') ?>" + temp.id,
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
    $("#"+ _modal +" .service-action-save").on("click", function(e) {
      e.preventDefault();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/moduleservice/ajax_save/') ?>" + _key,
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

    // Handle form reset
    resetForm = () => {
      _key = "";
      $("#"+ _form).trigger("reset");
      $("#"+ _form +" .service-description").height(40);
    };

    // Handle icon options
    $(".select2-html").select2({
      data: _backgroundColorLists,
      width: "100%",
      escapeMarkup: function(markup) {
        return markup;
      },
      templateResult: function(data) {
        return data.html;
      },
      templateSelection: function(data) {
        return data.text;
      }
    });

  });
</script>
