var total_photos_counter = 0;

Dropzone.options.myDropzone = {
 //autoProcessQueue: false,
 thumbnailWidth: 80,
 thumbnailHeight: 80,
 parallelUploads: 20,
 //previewsContainer: "#previews", // Define the container to display the previews
 acceptedFiles:'image/*',
 uploadMultiple: true,
 parallelUploads: 4,
 maxFiles: 4,
 maxFilesize: 4,
 dictRemoveFile: 'Remover Imagen',
 dictFileTooBig: 'Image is larger than 4MB',
 timeout: 10000,

 init: function() {
  var myDropzone = this;
 },
 complete: function() {
  total_photos_counter++;
  //$("#counter").text("# " + total_photos_counter);
  swal("Se subieron " + total_photos_counter + " fotos");
  console.log(total_photos_counter);
  location.reload();
 },
 maxfilesexceeded: function() {
  swal('El cantidad máxima de archivos es 4');
 }
};
