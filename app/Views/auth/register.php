<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Register Page - SIMS PPOB - AHMAD RIZKI AKBAR GANIYU</title>
</head>

<body>
<?php $validation = session('validation'); ?>
    <div class="h-screen flex justify-center">
        <div class="md:w-1/2 w-full px-10 md:px-0">
            <div class="flex flex-col items-center h-screen justify-center">
                <div class="flex justify-center gap-2 items-center">
                    <img src="/assets/images/Logo.png" alt="Logo">
                    <div class="text-3xl font-medium">SIMS PPOB</div>
                </div>
                <div class="font-medium md:text-4xl text-2xl mt-5 text-center">Lengkapi data untuk<br />membuat akun</div>
                <div class="w-full md:mt-14 mt-5 ">
                    <form action="/register-proses" onsubmit="return validate()" method="post" class="lg:max-w-lg mx-auto">
                        <div class="mt-5 text-gray-500">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                                    </svg>
                                </div>
                                <input name="email" value="<?= old('email') ?>" required class="font-semibold border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 focus:shadow-sm" type="email" placeholder="masukan email anda">
                                <?php if ($validation && $validation->hasError('email')): ?>
                                <div class="text-red-500 mt-2 text-right">
                                    <span><?= $validation->getError('email') ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 text-gray-500">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4   ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                    </svg>
                                </div>
                                <input name="first_name" value="<?= old('first_name') ?>" required class="font-semibold border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 shadow-sm" type="text" placeholder="nama depan">
                                <?php if ($validation && $validation->hasError('first_name')): ?>
                                <div class="text-red-500 mt-2 text-right">
                                    <span><?= $validation->getError('first_name') ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 text-gray-500">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4   ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                    </svg>
                                </div>
                                <input name="last_name" value="<?= old('last_name') ?>" required class="font-semibold border p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 shadow-sm" type="text" placeholder="nama belakang">
                                <?php if ($validation && $validation->hasError('last_name')): ?>
                                <div class="text-red-500 mt-2 text-right">
                                    <span><?= $validation->getError('last_name') ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 text-gray-500">
                            <div class="relative  mx-auto">
                                <div class="absolute flex items-center pl-3 top-4  " id="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 cursor-pointer end-0 top-4 " onclick="showPassword()" id="passwordOpenEye">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 end-0 top-4 hidden" onclick="showPassword()" id="passwordCloseEye">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z" />
                                    </svg>
                                </div>
                                <input required name="password" value="<?= old('password') ?>" id="password" class="font-semibold border w-full p-3 pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 shadow-sm" type="password" placeholder="buat password">
                                <?php if ($validation && $validation->hasError('password')): ?>
                                <div class="text-red-500 mt-2 text-right">
                                    <span><?= $validation->getError('password') ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 text-gray-500">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)" id="iconLock">
                                        <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 cursor-pointer end-0 top-4" onclick="showConfirmPassword()" id="passwordConfirmOpenEye">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 end-0 top-4 hidden" onclick="showConfirmPassword()" id="passwordConfirmCloseEye">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z" />
                                    </svg>
                                </div>
                                <input required name="confirm_password"  value="<?= old('confirm_password') ?>" id="confirm_password" class="font-semibold border w-full p-3 pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 shadow-sm" type="password" placeholder="konfirmasi password">
                                <div id="error_password" class="text-red-500 mt-2 text-right <?= ($validation && $validation->hasError('confirm_password')) ? '' : 'hidden' ?>">
                                    <span id="message">
                                        <?= ($validation && $validation->hasError('confirm_password')) ? $validation->getError('confirm_password') : '' ?>
                                    </span>
                                </div>
                                <?php if (session()->get('message_error')) : ?>
                                <div class="text-red-500 mt-2 text-right">
                                    <span >
                                        <?= session()->get('message_error'); ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-10 lg:max-w-lg mx-auto">
                            <button type="submit" class="w-full bg-[#f42619] p-3 rounded-md text-center text-white semi-bold cursor-pointer hover:bg-red-700">Registrasi</button>
                        </div>
                    </form>
                </div>
                <div class="md:mt-5 mt-3 text-center text-gray-500">
                    <p>Sudah punya akun? login <a href="/"><span class="text-[#f42619] font-bold">di sini</span></a></p>
                </div>
            </div>
        </div>
        <img class="lg:block hidden w-1/2 object-cover" src="/assets/images/ilustrasi_login.png" alt="Ilustrasi Login" srcset="">
    </div>
    <script>
        
        var inputPassword = document.getElementById('password');
        var inputPasswordConfirm = document.getElementById('confirm_password');
        var iconLock = document.getElementById('iconLock');
        var notif_error = document.getElementById('error_password');
    
        const DEFAULT_BORDER = 'border-gray-300';
        const ERROR_BORDER = 'border-red-400';
    
        const DEFAULT_FILL = 'oklch(27.8% 0.033 256.848)';
        const ERROR_FILL = 'oklch(63.7% 0.237 25.331)';
    
        function showPassword() {
            var iconOpeneye = document.getElementById('passwordOpenEye');
            var iconCloseeye = document.getElementById('passwordCloseEye');
    
            if (inputPassword.type === 'password') {
                inputPassword.type = 'text';
                iconOpeneye.classList.add('hidden');
                iconCloseeye.classList.remove('hidden');
                iconCloseeye.classList.add('block');
            } else {
                inputPassword.type = 'password';
                iconOpeneye.classList.remove('hidden');
                iconCloseeye.classList.remove('block');
                iconCloseeye.classList.add('hidden');
            }
        }
    
        function showConfirmPassword() {
            var iconOpeneye = document.getElementById('passwordConfirmOpenEye');
            var iconCloseeye = document.getElementById('passwordConfirmCloseEye');
    
            if (inputPasswordConfirm.type === 'password') {
                inputPasswordConfirm.type = 'text';
                iconOpeneye.classList.add('hidden');
                iconCloseeye.classList.remove('hidden');
                iconCloseeye.classList.add('block');
            } else {
                inputPasswordConfirm.type = 'password';
                iconOpeneye.classList.remove('hidden');
                iconCloseeye.classList.remove('block');
                iconCloseeye.classList.add('hidden');
            }
        }
    
        function validate() {
            var message = document.getElementById('message');
    
            if (inputPassword.value.length < 8 || inputPasswordConfirm.value.length < 8) {
                message.innerHTML = 'Password minimal 8 karakter';
                notif_error.classList.remove('hidden');
                inputPasswordConfirm.classList.remove(DEFAULT_BORDER);
                inputPasswordConfirm.classList.add(ERROR_BORDER);
                iconLock.setAttribute('fill', ERROR_FILL);
                return false;
            }
    
            if (inputPassword.value !== inputPasswordConfirm.value) {
                message.innerHTML = 'Password tidak sama';
                notif_error.classList.remove('hidden');
                inputPasswordConfirm.classList.remove(DEFAULT_BORDER);
                inputPasswordConfirm.classList.add(ERROR_BORDER);
                iconLock.setAttribute('fill', ERROR_FILL);
                return false;
            }
    
            notif_error.classList.add('hidden');
            resetStyles();
            return true;
        }
    
        function resetStyles() {
            inputPassword.classList.remove(ERROR_BORDER);
            inputPassword.classList.add(DEFAULT_BORDER);
    
            inputPasswordConfirm.classList.remove(ERROR_BORDER);
            inputPasswordConfirm.classList.add(DEFAULT_BORDER);
    
            iconLock.setAttribute('fill', DEFAULT_FILL);
            notif_error.classList.add('hidden');
        }
    
        inputPassword.addEventListener('focus', resetStyles);
        inputPasswordConfirm.addEventListener('focus', resetStyles);
    
    </script>
    
</body>
</html>