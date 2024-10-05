<div class="container mx-auto p-4">

    <x-slot name="header">Member</x-slot>

    <h1 class="text-2xl font-bold mb-4">Member Management</h1>

    <button wire:click="create()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Member</button>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 my-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full border-collapse border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Parent Member (UID)</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $member->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ optional($member->parent)->name }}</td>
                    <!-- Display parent member's name -->
                    <td class="border border-gray-300 px-4 py-2">
                        <button wire:click="edit({{ $member->id }})"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $member->id }})"
                            class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }} <!-- Pagination links -->

    <!-- Modal for creating/editing members -->
    <x-modal-view wire:model.defer="isEdit">
        <x-slot name="title">{{ $isEdit ? 'Edit Member' : 'Add Member' }}</x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="uid" class="block font-medium text-sm text-gray-700">Select Parent Member
                        (UID)</label>
                    <select id="uid" wire:model.defer="uid"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">None</option>
                        @foreach ($uids as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('uid')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="button" wire:click="$set('isEdit', false)"
                        class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">{{ $isEdit ? 'Update' : 'Save' }}</button>
                </div>
            </form>
        </x-slot>
    </x-modal-view>

</div>

@push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script> <!-- Include Alpine.js -->
@endpush
