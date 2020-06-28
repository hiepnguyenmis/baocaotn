var firebaseConfig = {
    apiKey: "AIzaSyDafnWdR5joLbVJNn0GRbZASnQHXwd7Od0",
    authDomain: "do-an-tot-nghiep-1d016.firebaseapp.com",
    databaseURL: "https://do-an-tot-nghiep-1d016.firebaseio.com",
    projectId: "do-an-tot-nghiep-1d016",
    storageBucket: "do-an-tot-nghiep-1d016.appspot.com",
    messagingSenderId: "972500526572",
    appId: "1:972500526572:web:f688e857e17c464c3f0cc9",
    measurementId: "G-B8VZ57Y6D4"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

///material
function uploadImageMaterialAdd() {


    if (document.getElementById("photoMateralAdd").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoMateralAdd').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageMaterialAdd');
                image.src = url;
                const textInput = document.getElementById('imageMaterialAddUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgAddMaterial').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgAddMaterial').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileMaterialAdd() {
    var preview = document.querySelector('#imageMaterialAdd');
    var file = document.querySelector('#photoMateralAdd').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}


// food
function uploadImageFoodsAdd() {


    if (document.getElementById("photoFoodsAdd").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoFoodsAdd').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageFoodsAdd');
                image.src = url;
                const textInput = document.getElementById('imageFoodsAddUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgAddFoods').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgAddFoods').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileFoodsAdd() {
    var preview = document.querySelector('#imageFoodsAdd');
    var file = document.querySelector('#photoFoodsAdd').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function uploadImageFoodsEdit() {


    if (document.getElementById("photoFoodsEdit").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoFoodsEdit').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageFoodsEdit');
                image.src = url;
                const textInput = document.getElementById('imageFoodsEditUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgEditFoods').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgEditFoods').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileFoodsEdit() {
    var preview = document.querySelector('#imageFoodsEdit');
    var file = document.querySelector('#photoFoodsEdit').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "https://via.placeholder.com/150x200";
    }
}
// employee
function uploadImageEmployeesAdd() {


    if (document.getElementById("photoEmployeesAdd").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoEmployeesAdd').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageEmployeesAdd');
                image.src = url;
                const textInput = document.getElementById('imageEmployeesAddUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgAddEmployees').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgAddEmployees').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileEmployeesAdd() {
    var preview = document.querySelector('#imageEmployeesAdd');
    var file = document.querySelector('#photoEmployeesAdd').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}





// customer
function uploadImageCustomersAdd() {


    if (document.getElementById("photoCustomersAdd").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoCustomersAdd').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageCustomersAdd');
                image.src = url;
                const textInput = document.getElementById('imageCustomersAddUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgAddCustomers').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgAddCustomers').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileCustomersAdd() {
    var preview = document.querySelector('#imageCustomersAdd');
    var file = document.querySelector('#photoCustomersAdd').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function uploadImageCustomersEdit() {


    if (document.getElementById("photoCustomersEdit").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoCustomersEdit').files[0];
        lo
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageCustomersEdit');
                image.src = url;
                const textInput = document.getElementById('imageCustomersEditUrl')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgEditCustomers').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgEditCustomers').innerHTML = "Chưa chọn ảnh"
    }
}

function previewFileCustomersEdit() {
    var preview = document.querySelector('#imageCustomersEdit');
    var file = document.querySelector('#photoCustomersEdit').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "https://via.placeholder.com/150x200";
    }
}

