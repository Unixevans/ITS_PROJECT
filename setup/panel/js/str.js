const postingan = document.querySelector('#create');
const sembunyi = document.querySelector('#sembunyi');
const muncul = document.querySelector('#ghosting');
postingan.addEventListener('click', function () {
    sembunyi.classList.add('d-none');
    muncul.classList.remove('d-none');
});


document.getElementById('fileInput').addEventListener('change', function (event) {
    var file = event.target.files[0];
    var previewImage = document.getElementById('previewImage');

    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewImage.style.display = 'none';
    }
});

const save = document.querySelector('#save');
const cancel = document.querySelector('#cancel');
const cancel1 = document.querySelector('#cancel1');
const toaster = document.querySelector('.toaster');
const closeIcon = document.querySelector('.close');
const progress = document.querySelector('.prog');
// -----------------------------------------------
const toaster1 = document.querySelector('.toaster1');
const closeIcon1 = document.querySelector('.close1');
const progress1 = document.querySelector('.prog1');


document.addEventListener("DOMContentLoaded", function() {
    var judul = document.getElementById("title-blog");
    var describe = document.getElementById("desc-blog");
    var thumbnail = document.getElementById("fileInput");
    save.addEventListener('click', function (event) {
        if (!judul.value || !describe.value || !thumbnail.value) {
            // event.preventDefault(); 
            toaster1.classList.add("active");
            progress1.classList.add('active');
            
            setTimeout(() => {
                toaster1.classList.remove("active");
            }, 5000);
            closeIcon1.addEventListener('click', function () {
                toaster1.classList.remove("active");
            
                setTimeout(() =>{
                    toaster1.classList.remove("active");
                }, 300);
            });
            
        } else {
            // event.preventDefault(); 
            save.addEventListener('click', function () {
                toaster.classList.add("active");
                progress.classList.add("active");
            
                setTimeout(() =>{
                    toaster.classList.remove("active");
                    window.location.reload();
                    sembunyi.classList.remove("d-none");
                    muncul.classList.add('d-none');
                }, 5000);
                closeIcon.addEventListener('click', function () {
                    toaster.classList.remove("active");
                
                    setTimeout(() =>{
                        toaster.classList.remove("active");
                    }, 300);
                });
                
            });
        }
    });
});




cancel.addEventListener('click', function () {
    sembunyi.classList.remove("d-none");
    muncul.classList.add('d-none');
})


closeIcon.addEventListener('click', function () {
    toaster.classList.remove("active");

    setTimeout(() =>{
        toaster.classList.remove("active");
    }, 300);
});

