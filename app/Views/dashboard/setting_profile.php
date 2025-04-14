<?= $this->extend('layouts/main')?>
<?= $this->section('page_title') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('content')?>
<div class="">
    <div class="w-max mx-auto text-center mt-10">
        <?php if (session()->has('success')): ?>
            <span class="block bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                <?= session('success') ?>
            </span>
        <?php endif; ?>
    
        <?php if (session()->has('error')): ?>
            <span class="block bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= session('error') ?>
            </span>
        <?php endif; ?>
        <div class="relative w-40 h-40 mx-auto">
            <img src="<?= $profile_image ?>" id="previewImage" class="rounded-full w-full h-full object-cover border border-gray-200 shadow" alt="Profile Photo">
            <div id="editPhoto" class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow-md cursor-pointer border border-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="oklch(27.8% 0.033 256.848)"><path d="M180-180h44l472-471-44-44-472 471v44Zm-60 60v-128l575-574q8-8 19-12.5t23-4.5q11 0 22 4.5t20 12.5l44 44q9 9 13 20t4 22q0 11-4.5 22.5T823-694L248-120H120Zm659-617-41-41 41 41Zm-105 64-22-22 44 44-22-22Z"/></svg>
            </div>
        </div>

        <h1 class="text-3xl font-semibold mt-2"><?= esc($first_name) . ' ' . esc($last_name) ?></h1>
    </div>
    <div class="w-full md:mt-14 mt-5 md:px-0">
        <form action="/dashboard/update-profile" method="post" class="lg:max-w-lg mx-auto px-20 md:px-0" onsubmit="return validate()" enctype="multipart/form-data">
            <div class="mt-5">
                <label for="" class="font-medium text-gray-800">Email</label>
                <div class="relative mx-auto mt-2">
                    <div class="absolute flex items-center pl-3 top-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(13% 0.028 261.692)">
                            <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                        </svg>
                    </div>
                    <input disabled required class="font-medium text-gray-950 border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none bg-gray-200" type="email" value="<?= esc($email)?>" placeholder="masukan email anda">
                    <input type="file" name="file" id="profile_image" class="hidden" accept="image/png, image/jpeg"> 
                </div>
            </div>
            <div class="mt-5">
                <label for="" class="font-medium text-gray-800">Nama Depan</label>
                <div class="relative mx-auto mt-2">
                    <div class="absolute flex items-center pl-3 top-4  ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(13% 0.028 261.692)">
                            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg>
                    </div>
                    <input disabled id="first_name" required class="bg-gray-200 font-medium text-gray-950 border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none" type="text" value="<?= esc($first_name)?>"  name="first_name" placeholder="nama depan">
                </div>
            </div>
            <div class="mt-5">
                <label for="" class="font-medium text-gray-800">Nama Belakang</label>
                <div class="relative mx-auto mt-2">
                    <div class="absolute flex items-center pl-3 top-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(13% 0.028 261.692)">
                            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg>
                    </div>
                    <input disabled id="last_name" required class="bg-gray-200 font-medium text-gray-950 border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none" type="text" value="<?= esc($last_name)?>" name="last_name"  placeholder="nama belakang">
                </div>
            </div>
            <div class="mt-10 lg:max-w-lg mx-auto">
                <button id="btnEdit" type="button" class="font-medium w-full bg-[#f42619] p-3 rounded-md text-center text-white semi-bold cursor-pointer hover:bg-red-700">Edit Profile</button>
            </div>
            <div class="mt-8 lg:max-w-lg mx-auto">
                <button type="submit" id="btnLogout" class="font-medium w-full border-[#f42619] bg-white text-red-500 p-3 rounded-md text-center border semi-bold cursor-pointer hover:bg-[#f42619] hover:text-white">Logout</button>
            </div>
        </form>
    </div>
</div>
<script>
    const btnLogout = document.getElementById('btnLogout');
    const btnEdit = document.getElementById('btnEdit');
    const form = document.querySelector('form');
    const first_name = document.getElementById('first_name');
    const last_name = document.getElementById('last_name');
    let isEditMode = false;
    let originalFirstName = first_name.value;
    let originalLastName = last_name.value;


    btnEdit.addEventListener('click', function (e) {
        e.preventDefault();
        if (!isEditMode) {
            originalFirstName = first_name.value;
            originalLastName = last_name.value;

            btnLogout.textContent = 'Batalkan';
            btnEdit.textContent = 'Simpan';
            btnEdit.setAttribute('type', 'submit');

            first_name.removeAttribute('disabled');
            last_name.removeAttribute('disabled');
            first_name.classList.remove('bg-gray-200');
            last_name.classList.remove('bg-gray-200');

            isEditMode = true;
        } else {
            form.submit();
        }
    });

    btnLogout.addEventListener('click', function (e) {
        if (isEditMode) {
            e.preventDefault();

            first_name.value = originalFirstName;
            last_name.value = originalLastName;

            btnLogout.textContent = 'Logout';
            btnEdit.textContent = 'Edit Profile';
            btnEdit.setAttribute('type', 'button');

            first_name.setAttribute('disabled', true);
            last_name.setAttribute('disabled', true);
            first_name.classList.add('bg-gray-200');
            last_name.classList.add('bg-gray-200');

            isEditMode = false;
        } else {
            window.location.href = "/logout";
        }
    });


    function validate() {
        return isEditMode;
    }

    const inputFile = document.getElementById('profile_image');
    const previewImage = document.getElementById('previewImage');

    inputFile.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            if(file.size > 100000){
                alert('Maximum size 100KB');
                this.value = '';
            } else {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    document.getElementById('editPhoto').addEventListener('click', function () {
        inputFile.click();
    });

</script>

<?= $this->endSection()?>