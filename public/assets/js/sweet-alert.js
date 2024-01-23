window.addEventListener('swal:modal', event => {
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
    });
});

// window.addEventListener('swal:confirm', event => {
//     swal({
//         title: event.detail.message,
//         text: event.detail.text,
//         icon: event.detail.type,
//         buttons: true,
//         dangerMode: true,
//     })
//         .then((willDelete) => {
//             if (willDelete) {
//                 window.livewire.emit('remove');
//             }
//         });
// });