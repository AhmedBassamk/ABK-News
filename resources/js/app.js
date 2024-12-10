import "./bootstrap";
// require('./bootstrap')

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
// Echo.private(`App.Models.User.${userId}`)
//     .notification((notification) => {
//         console.log(notification.content);
//     });
Echo.channel('notify').listen('.notify', (e) => {
    console.log(e.content);
    const countElement = document.querySelector(".count");

    // إنشاء العنصر الجديد للإشعار
    var notificationItem = `<a class="dropdown-item preview-item notify bg-white"
        data-id="${e.id}">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-info">
                <i class="ti-user mx-0"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <h6 class="preview-subject font-weight-normal">
                ${e.content}</h6>
            <p class="font-weight-light small-text mb-0 text-muted">
                منذ ثانية
            </p>
        </div>
    </a>`;

    $('#notify__').prepend(notificationItem);
    countElement.innerText = parseInt(countElement.innerText) + 1;
});

// Echo.channel('notify').listen(notify, (e)=>{
//     console.log(e.content);
// })
