var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 2,
    maxFiles:4,
    maxFilesize: 4,
    addRemoveLinks: true,
    dictRemoveFile: 'Remover Imagen',
    dictFileTooBig: 'Image is larger than 4MB',
    timeout: 10000,

    init: function () {
      this.on("removedfile", function (file) {
          $.post({
              url: '/images-delete',
              data: {id: file.name, _token: $('[name="_token"]').val()},
              dataType: 'json',
              success: function (data) {
                  total_photos_counter--;
                  $("#counter").text("# " + total_photos_counter);
              }
          });
      });
      // Update selector to match your button
      $("#dz-submit").click(function (e) {
          e.preventDefault();
          myDropzone.processQueue();
      });
      this.on('sending', function(file, xhr, formData) {
        // Append all form inputs to the formData Dropzone will POST
        var data = $('#frmTarget').serializeArray();
        $.each(data, function(key, el) {
            formData.append(el.name, el.value);
        });
      });

    },
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
         console.log(done);
         location.reload();
    },
    maxfilesexceeded: function(){
       alert('El cantidad máxima de archivos es 4');
    }


};
