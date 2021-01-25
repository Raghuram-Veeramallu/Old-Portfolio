/* START MODAL SLIDESHOW */
var achSlideIndex = [1, 1, 1, 1];
var i;
for (i=0; i < achSlideIndex.length; i++){
    achShowSlides(achSlideIndex[i], i+1);
}

// Next/previous controls
function achPlusSlides(n, ach_index) {
    achShowSlides(achSlideIndex[ach_index-1] += n, ach_index);
}

// Thumbnail image controls
function achCurrentSlide(n, ach_index) {
    achShowSlides(achSlideIndex[ach_index-1] = n, ach_index);
}

function achShowSlides(n, ach_index) {
    var i;
    var ach_modal_slides = document.getElementsByClassName(`ach_slide_${ach_index}`);
    var ach_modal_dots = document.getElementsByClassName(`ach_dot_slide_${ach_index}`);
    if (n > ach_modal_slides.length) {
        achSlideIndex[ach_index-1] = 1;
    }
    if (n < 1) {
        achSlideIndex[ach_index-1] = ach_modal_slides.length;
    }
    for (i = 0; i < ach_modal_slides.length; i++) {
        ach_modal_slides[i].style.display = "none";
    }
    for (i = 0; i < ach_modal_dots.length; i++) {
        ach_modal_dots[i].className = ach_modal_dots[i].className.replace(" modal-active", "");
    }
    ach_modal_slides[achSlideIndex[ach_index-1]-1].style.display = "block"; 
    ach_modal_dots[achSlideIndex[ach_index-1]-1].className += " modal-active";
}



var slideIndex = [1, 1, 1, 1, 1, 1];
var i;
for (i=0; i < slideIndex.length; i++){
    showSlides(slideIndex[i], i+1);
}

// Next/previous controls
function plusSlides(n, index) {
    showSlides(slideIndex[index-1] += n, index);
}

// Thumbnail image controls
function currentSlide(n, index) {
    showSlides(slideIndex[index-1] = n, index);
}

function showSlides(n, index) {
    var i;
    var modal_slides = document.getElementsByClassName(`slide_${index}`);
    var modal_dots = document.getElementsByClassName(`dot_slide_${index}`);
    if (n > modal_slides.length) {
        slideIndex[index-1] = 1;
    }
    if (n < 1) {
        slideIndex[index-1] = modal_slides.length;
    }
    for (i = 0; i < modal_slides.length; i++) {
        modal_slides[i].style.display = "none";
    }
    for (i = 0; i < modal_dots.length; i++) {
        modal_dots[i].className = modal_dots[i].className.replace(" modal-active", "");
    }
    modal_slides[slideIndex[index-1]-1].style.display = "block"; 
    modal_dots[slideIndex[index-1]-1].className += " modal-active";
}

/* END MODAL SLIDESHOW */