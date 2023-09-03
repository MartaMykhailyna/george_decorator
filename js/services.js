const image = document.getElementById('image');
const textOverlay = document.getElementById('text-overlay');

image.addEventListener('mouseover', () => {
    textOverlay.style.opacity = '1';
});

image.addEventListener('mouseout', () => {
    textOverlay.style.opacity = '0';
});