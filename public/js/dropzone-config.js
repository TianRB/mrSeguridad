Dropzone.autoDiscover = false;

var dzbg = new Dropzone('#img-bg', {
	// url: $(this).attr.action,
	thumbnailWidth: 80,
	thumbnailHeight: 80,
	parallelUploads: 20,
	//previewsContainer: "#previews", // Define the container to display the previews
	acceptedFiles:'image/*',
	uploadMultiple: true,
	parallelUploads: 4,
	maxFiles: 1,
	maxFilesize: 4,
	dictRemoveFile: 'Remover Imagen',
	dictFileTooBig: 'La imagen es mayor a 4MB',
	timeout: 10000,
});
var dzfg = new Dropzone('#img-article', {
	// url: $(this).attr.action,
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
	dictFileTooBig: 'La imagen es mayor a 4MB',
	timeout: 10000,
});
$(function() {


	// Now that the DOM is fully loaded, create the dropzone, and setup the
	// event listeners
	dzfg.on("init", function(file) {
		/* Maybe display some more file information on your page */
		console.log('dzfg init');
	});
	dzfg.on("addedfile", function(file) {
		/* Maybe display some more file information on your page */
		console.log('Img uploaded');
	});
})
