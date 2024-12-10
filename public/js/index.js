// window.Echo = require("laravel-echo");
// window.Pusher = require("pusher-js");

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
//     wsHost: import.meta.env.VITE_PUSHER_HOST
//         ? import.meta.env.VITE_PUSHER_HOST
//         : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
//     enabledTransports: ["ws", "wss"],
// });

// var userId = "{{ auth()->user()->id }}";

// Echo.private("chatAdmins" + userId).notification((notification) => {
//     var timeAgo = moment(notification.created_at).fromNow(); // استخدم مكتبة moment.js لتنسيق الوقت بشكل أفضل

//     var a = `<a class="dropdown-item preview-item notify bg-white"
//                     data-id="${notification.id}">
//                     <div class="preview-thumbnail">
//                         <div class="preview-icon bg-info">
//                             <i class="ti-user mx-0"></i>
//                         </div>
//                     </div>
//                     <div class="preview-item-content">
//                         <h6 class="preview-subject font-weight-normal">
//                           ${notification.content}</h6>
//                         <p class="font-weight-light small-text mb-0 text-muted">
//                             ${timeAgo}
//                         </p>
//                     </div>
//                 </a>`;

//     $("#notify").append(a);
// });
