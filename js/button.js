function showImage() {
    const image = document.getElementById("image_btn");
    if (image.style.display === "none") {
        image.style.display = "block";
    } else {
        image.style.display = "none";
    }
}