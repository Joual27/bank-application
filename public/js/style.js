
// const form = document.getElementById('form');
// const btnForm = document.getElementById('btnForm');
// const clsBtn = document.getElementById('btnCloseform');
// const subBtn = document.getElementById('submitBtn');
// console.log(subBtn);

// btnForm.addEventListener('click', () => {
//     if (form.classList.contains('scale-0')) {
//         form.classList.toggle("scale-100");
//     }
// });
// clsBtn.addEventListener('click', () => {
//     if (form.classList.contains('scale-100')) {
//         form.classList.remove("scale-100");
//     }
// });



// // window.addEventListener('click' , ()=> {
// //     if (form.classList.contains('scale-100')) {
// //         form.classList.remove('scale-100');
// //         form.classList.add('scale-0');
    
// //     }
// // })
$(document).ready( function () {
    $('#myTable').DataTable({
        'column' : [
            {data : 'id'},
            {data : 'Username'},
            {data : 'ville'},
            {data : 'Quartier'},
            {data : 'Rue'},
            {data : 'Code Postal'},
            {data : 'Email'},
            {data : 'Phone'}
        ]




    });
    
} );

// =================

const slideBtn = document.getElementById('slideBar');
const slideControl = document.getElementById('sideControl');

slideBtn.onclick = () => {

    if (slideControl.classList.contains('open')) {
        slideControl.classList.remove('open');
        slideControl.classList.add('close');

    }else {
        slideControl.classList.add('open');
        slideControl.classList.remove('close');
    }

}