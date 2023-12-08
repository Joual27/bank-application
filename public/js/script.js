const iconNotification = document.getElementById('iconNotification');
const popNotification = document.getElementById('popNotification');

iconNotification.addEventListener('click', (e) => {

    popNotification.classList.remove("scale-0");
    popNotification.classList.add("scale-110");

});

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const title = document.getElementById('title');

    sidebar.addEventListener('mouseover', function () {
        if (sidebar.offsetWidth >= 250) {
            title.forEach(title => {
                title.classList.remove('hidden');
            });
        }
    });

    sidebar.addEventListener('mouseout', function () {
        title.forEach(title => {
            title.classList.add('hidden');
        });
    });
});




