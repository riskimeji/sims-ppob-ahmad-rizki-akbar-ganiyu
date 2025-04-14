<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Login Page - SIMS PPOB - AHMAD RIZKI AKBAR GANIYU</title>
</head>

<body>
    <div class="h-screen flex justify-center">
        <div class="md:w-1/2 w-full px-10 md:px-0">
            <div class="flex flex-col items-center h-screen justify-center">
                <div class="flex justify-center gap-2 items-center mt-10">
                    <img src="/assets/images/Logo.png" alt="Logo">
                    <div class="text-3xl font-medium">SIMS PPOB</div>
                </div>
                <div class="font-medium md:text-4xl text-2xl mt-10 text-center">Masuk atau buat akun<br />untuk memulai</div>
                <div class="w-full text-center md:mt-14 mt-8 ">
                    <form action="/login-proses" method="post" class="lg:max-w-lg mx-auto">
                        <div class="mt-5">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4 md:block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                                    </svg>
                                </div>
                                <input name="email" class="font-semibold border text-gray-500 focus:text-black p-3 w-full pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 focus:shadow-sm" type="email" placeholder="masukan email anda" required>
                            </div>
                        </div>
                        <div class="mt-5 ">
                            <div class="relative mx-auto">
                                <div class="absolute flex items-center pl-3 top-4 md:block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(27.8% 0.033 256.848)">
                                        <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 end-0 top-4 block " onclick="showPassword()" id="openeye">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                    </svg>
                                </div>
                                <div class="absolute flex items-center pr-3 end-0 top-4 hidden" onclick="showPassword()" id="closeeye">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(86.9% 0.022 252.894)">
                                        <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z" />
                                    </svg>
                                </div>
                                <input name="password" id="password" class="font-semibold text-gray-500 focus:text-black border w-full p-3 pl-12 rounded-md border-gray-300 focus:outline-none focus:border-blue-200 focus:shadow-sm" type="password" placeholder="masukan password anda" required>
                            </div>
                        </div>
                        <div class="mt-10 lg:max-w-lg mx-auto">
                            <button type="submit" class="w-full bg-[#f42619] p-3 rounded-md text-center text-white semi-bold cursor-pointer hover:bg-red-700">Masuk</button>
                        </div>
                    </form>
                </div>
                <div class="md:mt-6 mt-3 text-center text-gray-500">
                    <p>Belum punya akun? registrasi <a href="/register"><span class="text-[#f42619] font-bold">di sini</span></a></p>
                </div>
                <?php if (session()->get('message_error')) : ?>
                <div id="divMsg" class="p-2 text-red-400 bg-red-100 md:w-2xl lg:w-xl w-full mt-10 rounded-sm md:mt-50 flex justify-between items-center">
                    <span class="pl-2"><?= session()->get('message_error'); ?></span>
                    <div class="cursor-pointer" onclick="closeNotif()">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(70.4% 0.191 22.216)">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (session()->get('message_success')) : ?>
                <div id="divMsg" class="p-2 text-green-600 bg-green-100 md:w-2xl lg:w-xl w-full mt-10 rounded-sm md:mt-50 flex justify-between items-center">
                    <span class="pl-2"><?= session()->get('message_success'); ?></span>
                    <div class="cursor-pointer" onclick="closeNotif()">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="24px" fill="oklch(70.4% 0.191 22.216)">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <img class="lg:block hidden w-1/2 object-cover" src="/assets/images/ilustrasi_login.png" alt="Ilustrasi Login" srcset="">
    </div>
</body>
<script>
    function showPassword() {
        var inputButton = document.getElementById('password');
        var iconOpeneye = document.getElementById('openeye');
        var iconCloseeye = document.getElementById('closeeye');
        if (inputButton.type == 'password') {
            inputButton.type = 'text'
            iconOpeneye.classList.add('hidden')
            iconCloseeye.classList.remove('hidden')
            iconCloseeye.classList.add('block')
        } else {
            inputButton.type = 'password'
            iconOpeneye.classList.remove('hidden')
            iconCloseeye.classList.remove('block')
            iconCloseeye.classList.add('hidden')
        }
    }

    function closeNotif() {
        var divMsg = document.getElementById('divMsg');
        divMsg.classList.add('hidden')
    }
</script>

</html>