



// Trailer
document.addEventListener('DOMContentLoaded', function() {
    var trailerModal = document.getElementById('trailerModal');
    trailerModal.addEventListener('hide.bs.modal', function() {
        var iframe = document.getElementById('youtubeTrailer');
        iframe.src = iframe.src; // Reset the src to stop the video
    });
});
