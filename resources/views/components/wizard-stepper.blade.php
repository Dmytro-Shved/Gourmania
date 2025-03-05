@props(['form_step'])
<ol class="flex w-full items-center justify-between gap-2 sm:gap-4 relative" aria-label="registration progress">
    @if($form_step == 1)
        <!-- step 1 (current) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">1</span>
            <span class="absolute top-8 text-xs font-bold sm:static sm:top-0 sm:text-base">Info</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 2 -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">2</span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Ingredients</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 3 -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">3</span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Guide</span>
        </li>
    @endif

    @if($form_step == 2)
        <!-- step 1 (completed) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
                            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                   <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Info</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 2  (current) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">2</span>
            <span class="absolute top-8 text-xs font-bold sm:static sm:top-0 sm:text-base">Ingredients</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 3 -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">3</span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Guide</span>
        </li>
    @endif

    @if($form_step == 3)
        <!-- step 1 (completed) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
                            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                   <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Info</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 2 (completed) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
                            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                  <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
            <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Ingredients</span>
        </li>

        <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

        <!-- step 3 (current) -->
        <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
            <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">3</span>
            <span class="absolute top-8 text-xs font-bold sm:static sm:top-0 sm:text-base">Guide</span>
        </li>
    @endif
</ol>
