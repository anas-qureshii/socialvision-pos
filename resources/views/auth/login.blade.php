<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="themeFont">
    <div class="w-full h-[100vh] bg-[#F4F7FE] flex items-center justify-center">
        <div class="w-[30%] bg-white rounded-xl py-6 px-2 text-lg flex flex-col justify-center gap-3">
           
           <div class="w-full flex justify-center p-2">
            <img src="{{asset('assets/Socialz-Vision-logo-fi.webp')}}" alt="logo" class="w-1/5">
           </div>
            <div class="w-full flex flex-col justify-center text-center gap-2">
                <h2 class="themeFont text-2xl font-medium">Sign in</h2>
                <p class="text-sm themeFont">Login! to contiue to dashboard</p>
            </div>
            <div class="w-full flex flex-col gap-3 p-2 mt-4">
                <div class="w-full relative">
                    <span
                        class="material-icons !text-lg absolute top-1/2 left-[20px] -translate-y-1/2 -translate-x-1/2">alternate_email</span>
                    <input type="text"
                        class="w-full rounded-lg py-2 pl-[40px] h-[40px] text-sm outline-0 themeFont border border-gray-300 focus:border-[#01ECCA]"
                        placeholder="Your Email">
                </div>
                <div class="w-full relative">
                    <span
                        class="material-icons !text-lg absolute top-1/2 left-[20px] -translate-y-1/2 -translate-x-1/2">lock</span>
                    <input type="text"
                        class="w-full rounded-lg py-2 pl-[40px] h-[40px] text-sm outline-0 themeFont border border-gray-300 focus:border-[#01ECCA]"
                        placeholder="Your Email">
                </div>
                <div class="w-full p-2 flex items-center gap-2">
                    <input type="checkbox" name="" id="remember_me" class="bg-gray-300 outline-0 border-0">
                    <label for="remember_me" class="text-sm text-gray-500">remember me</label>
                </div>
                <input type='submit' value='signup' class='w-full py-3 px-2 rounded-lg bg-blue-700 text-white capitalize'>
            </div>
           
        </div>
    </div>
</body>

</html>
