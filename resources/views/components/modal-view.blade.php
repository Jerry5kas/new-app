<div x-data="{ open: @entangle($attributes['model']) }" x-show.transition.opacity.out.duration.1500ms "open" style="display: none;">
    <div class="fixed inset-x-0 top-[10%] z-[100] flex justify-center">
        <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            {{ $title }}
            {{ $content }}
            <button @click.prevent="$set('open', false)"
                class="absolute top-[8px] right-[8px] text-lg font-bold">&times;</button>
        </div>
    </div>
</div>

<style scoped>
    [x-cloak] {
        display: none;
    }
</style>
