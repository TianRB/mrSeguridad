var total_photos_counter = 0;

Dropzone.options.myDropzone = {
 //autoProcessQueue: false,
 thumbnailWidth: 80,
 thumbnailHeight: 80,
 parallelUploads: 20,
 previewsContainer: "#previews", // Define the container to display the previews
 acceptedFiles:'image/*',
 uploadMultiple: true,
 parallelUploads: 4,
 maxFiles: 4,
 maxFilesize: 4,
 dictRemoveFile: 'Remover Imagen',
 dictFileTooBig: 'Image is larger than 4MB',
 timeout: 10000,

 init: function() {
  // this.on("removedfile", function (file) {
  //     $.post({
  //         url: '/images-delete',
  //         data: {id: file.name, _token: $('[name="_token"]').val()},
  //         dataType: 'json',
  //         success: function (data) {
  //             total_photos_counter--;
  //             $("#counter").text("# " + total_photos_counter);
  //         }
  //     });
  // });
  var myDropzone = this;

  // First change the button to actually tell Dropzone to process the queue.
  this.element.querySelector("#dz-submit").addEventListener("click", function(e) {
   // Make sure that the form isn't actually being sent.
   e.preventDefault();
   e.stopPropagation();
   myDropzone.processQueue();
  });

  // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
  // of the sending event because uploadMultiple is set to true.
  // this.on("sendingmultiple", function() {
  //  swal('se envian muchas');
  // });
  // this.on("successmultiple", function(files, response) {
  //  swal('hubo exito haciendo obo');
  // });
  // this.on("errormultiple", function(files, response) {
  //  swal('tienes un problema');
  // });
 },
 complete: function() {
  total_photos_counter++;
  //$("#counter").text("# " + total_photos_counter);
  swal("Se subieron " + total_photos_counter + " fotos");
  console.log(total_photos_counter);
  //location.reload();
 },
 maxfilesexceeded: function() {
  swal('El cantidad máxima de archivos es 4');
 }
};
