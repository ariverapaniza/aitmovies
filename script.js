// Read More
// document.addEventListener('DOMContentLoaded', function() {
//     document.body.addEventListener('click', function(event) {
//         if (event.target.matches('.read-more-link')) {
//             showFullDescription(event.target);
//         }
//     });
// });

// function showFullDescription(linkElement) {
//     console.log("Read more clicked");
//     var fullDescription = linkElement.nextElementSibling;
//     linkElement.style.display = 'none';
//     fullDescription.style.display = 'inline';
// }

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
    console.log(fullDescription); // Debugging: log the full description element
    linkElement.style.display = 'none';
    fullDescription.style.display = 'inline';
}




// Trailer
document.addEventListener('DOMContentLoaded', function() {
    var trailerModal = document.getElementById('trailerModal');
    trailerModal.addEventListener('hide.bs.modal', function() {
        var iframe = document.getElementById('youtubeTrailer');
        iframe.src = iframe.src; // Reset the src to stop the video
    });
});


// Newest movie carousel
$(document).ready(function() {
    $('#newestMoviesCarousel').carousel({
        interval: 3000
    });
});