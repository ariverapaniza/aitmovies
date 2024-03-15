

document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM fully loaded and parsed");
    document.body.addEventListener('click', function(event) {
        if (event.target.matches('.read-more-link')) {
            showFullDescription(event.target);
        }
    });
});

function showFullDescription(linkElement) {
    console.log("Read more clicked");
    var fullDescription = linkElement.nextElementSibling;
    console.log(fullDescription); 
    linkElement.style.display = 'none';
    fullDescription.style.display = 'inline';
}




// Trailer
document.addEventListener('DOMContentLoaded', function() {
    var trailerModal = document.getElementById('trailerModal');
    trailerModal.addEventListener('hide.bs.modal', function() {
        var iframe = document.getElementById('youtubeTrailer');
        iframe.src = iframe.src; 
    });
});


// Newest movie carousel
$(document).ready(function() {
    $('#newestMoviesCarousel').carousel({
        interval: 3000
    });
});