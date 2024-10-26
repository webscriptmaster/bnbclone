function url() {
 var baseUrl = window.location.protocol + '//' + window.location.hostname;
 if (window.location.port) {
   baseUrl += ':' + window.location.port;
 }
 if (window.location.pathname !== '/') {
   var folder = window.location.pathname.split('/').filter(function(item) {
     return item.trim() !== '';
   })[0];
   if (folder) {
     baseUrl += '/' + folder;
   }
 }
 baseUrl += '/api/';
 return baseUrl;
}

function message(type, message){
  const js = document.createElement('script');
  js.src = 'https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js';
  document.body.appendChild(js);
  const css = document.createElement('link');
  css.rel = 'stylesheet';
  css.href = 'https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css';
  document.head.appendChild(css);
  js.onload = function(){
      var notyf = new Notyf();
      notyf[type]({
          message: message,
          dismissible: true,
          duration: 5000,
          position: {
              x: 'right',
              y: 'top',
          }
      })
      .on('dismiss', ({target, event}) => foobar.retry());
  }
}

function updateUserStatus() {
 $.ajax({
   url: '../api/update_status',
   method: 'POST',
   data: { status: 'online', page: 'update_user_status', csrf_token: $('input[name="csrf_token"]').val() },
   success: function(response) {
     // Success handling
     console.log('User status updated to online.');
   },
   error: function(xhr, status, error) {
     // Error handling
     console.log('Failed to update user status to online.');
   }
 });
}

updateUserStatus();

function handleUnexpectedDisconnect() {
 $.ajax({
   url: '../api/update_status',
   method: 'POST',
   data: { status: 'offline', page: 'update_user_status', csrf_token: $('input[name="csrf_token"]').val() },
   success: function(response) {
     console.log('User status updated to offline.');
   },
   error: function(xhr, status, error) {
     console.log('Failed to update user status to offline.');
   }
 });
}

function handleKeyPress(event) {
 if (
   event.ctrlKey &&
   (event.key === 'w' || event.key === 'W') 
 ) {
   handleUnexpectedDisconnect();
 }
}

function handleBeforeUnload() {
 handleUnexpectedDisconnect();
}

setInterval(updateUserStatus, Math.floor(Math.random() * 3000) + 3000);

$(document).on('keydown', handleKeyPress);

$(window).on('beforeunload', handleBeforeUnload);




 
 