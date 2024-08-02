// function showSection(sectionId) {
//     // Hide all sections
//     document.querySelectorAll('main section').forEach(section => {
//         section.classList.add('hidden');
//     });
//     // Show the selected section
//     document.getElementById(sectionId).classList.remove('hidden');
// }

// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('nav ul li a').forEach(link => {
//         link.addEventListener('click', event => {
//             event.preventDefault();
//             const sectionId = event.target.getAttribute('onclick').replace("showSection('", "").replace("')", "");
//             showSection(sectionId);
//         });
//     });
//     // Show home section by default
//     showSection('home');
// });

function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('main section').forEach(section => {
        section.classList.add('hidden');
    });

    // Show the selected section
    document.getElementById(sectionId).classList.remove('hidden');
}

// Example usage:
// Assuming you have a 'home' section initially visible on page load
showSection('home');
