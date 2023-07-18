function toggleForm() {
    root = document.querySelector(':root');
    rootStyles = getComputedStyle(root)
    mainColor = rootStyles.getPropertyValue('--color-form')
    if (mainColor === '#ffffff') {
        root.style.setProperty('--color-form', '#e73e49');
    } else {
        root.style.setProperty('--color-form', '#ffffff');
    } 
    container = document.querySelector('.container');
    container.classList.toggle('active');
}