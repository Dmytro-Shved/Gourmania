<div>
    <p class="font-inclusive font-semibold text-white text-xl text-center">Info</p>

    <div class="w-full max-w-md mx-auto sm:w-44">
        <div x-data="{selected:null}">
            <ul class="shadow-box">
                {{-- Who we are --}}
                <li class="relative border-b border-gray-200">
                    <button type="button" class="w-full py-6 text-left"
                            @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="flex items-center justify-between">
                            <span class="text-white font-inclusive hover:cursor-pointer">
                                About us
                            </span>
                        </div>
                    </button>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                         x-ref="container1"
                         x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="p-6">
                            <p class="text-white text-[15px] font-inclusive">
                                Gourmania is an open source project that lets you create, browse and store recipes. This project was created by <a
                                    href="https://github.com/Dmytro-Shved" class="underline">Dmytro
                                    Shved
                                </a>
                            </p>
                        </div>
                    </div>
                </li>

                {{-- Team --}}
                <li class="relative border-b border-gray-200">
                    <button type="button" class="w-full py-6 text-left"
                            @click="selected !== 2 ? selected = 2 : selected = null">
                        <div class="flex items-center justify-between">
                            <span class="text-white font-inclusive hover:cursor-pointer">
                                Team
                            </span>
                            <span class="ico-plus"></span>
                        </div>
                    </button>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                         x-ref="container2"
                         x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                        <div class="p-6">
                            <span class="text-white text-[15px] font-inclusive">
                                At the moment the team consists of one person:
                                <br> <a href="https://github.com/Dmytro-Shved" class="underline">Dmytro Shved</a>
                            </span>
                        </div>
                    </div>
                </li>

                {{-- Info --}}
                <li class="relative border-b border-gray-200">
                    <button type="button"
                            class="w-full py-6 text-left"
                            @click="selected !== 3 ? selected = 3 : selected = null">
                        <div class="flex items-center justify-between">
                            <span class="text-white font-inclusive hover:cursor-pointer">
                                Question
                            </span>
                        </div>
                    </button>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                         x-ref="container3"
                         x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                        <div class="p-6 items-start">
                            <div class="text-white text-[15px] font-inclusive">
                                Which came first, the chicken or the egg?
                            </div>

                            <div class="text-white text-[15px] font-inclusive mt-5">The egg as a method of reproduction predates chickens by a long</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
