<div>
    <x-slot name="header">Register</x-slot>

    <div class="relative ">
        <img src="../../../../images/abstract-1.jpg" alt="" class="w-full h-screen opacity-90 z-[1]">
        <div class="w-full h-full mx-auto absolute top-1
        flex-col
         flex justify-center items-center">
            <div class="w-2/6 mx-auto my-5 font-semibold
             self-start text-white text-3xl">Register</div>
            <div class="w-2/6 h-3/4 border-2 border-white p-5 flex-col flex justify-evenly gap-y-5 rounded-md">
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">Referral ID <span class="text-red-500">*</span></label>
                    <input type="text" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">User ID <span class="text-red-500">*</span></label>
                    <input type="text" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">Email ID<span class="text-red-500">*</span></label>
                    <input type="text" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">Phone No<span class="text-red-500">*</span></label>
                    <input type="text" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div class="flex-col flex">
                    <label for="" class="text-xs text-white font-semibold inline-flex gap-x-1">Password<span class="text-red-500">*</span></label>
                    <input type="password" class="bg-transparent text-white border-white border rounded-md">
                </div>
                <div>
                    <input type="checkbox" class="w-4 h-4 bg-transparent border-white  text-blue-600  rounded-sm transition-all ease-linear duration-500 ">
                </div>
                <div class=" flex-col flex">
                    <button class="bg-transparent border border-white text-white text-sm group
                    font-semibold hover:bg-black/40 hover:border-2 hover:border-cyan-600 rounded-md text-center h-16 transition-all' duration-500 ease-out ">Sign UP</button>
                </div>
            </div>
            <div class="text-yellow-400 text-sm font-semibold inline-flex items-center"><span>Already have an account?</span><span class="underline text-white">Sign in here</span></div>
        </div>
    </div>
</div>
