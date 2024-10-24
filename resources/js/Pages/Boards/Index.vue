<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, InertiaLink, useForm } from "@inertiajs/inertia-vue3";
import {
  Popover,
  PopoverButton,
  PopoverPanel,
  PopoverOverlay,
} from "@headlessui/vue";
import { PlusIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
  boards: Array
});

const form=useForm({
  name: '',
});

function onSubmit(closePopover){
  form.post(route('boards.store'), {
    onSuccess:() => {
      form.reset();
      closePopover();
    }
  });
}

</script>

<template>
  <Head title="Boards" />

  <BreezeAuthenticatedLayout>
    <div class="h-full px-4 py-6 overflow-y-auto bg-gray-50">
      <div class="max-w-5xl max-auto">
        <div class="flex items-center px-3 mb-4">
          <h3 class="font-black text-gray-700">My boards</h3>
          <Popover v-slot="{ open }" class="relative">
            <PopoverButton
              :class="open ? 'bg-blue-50 text-blue-600' : ''"
              class="ml-4 py=2 px=4 bg-gray-100 rounded font-medium hover:bg-gray-200 inline-flex items-center"
            >
              <PlusIcon class="w-4 h-4 -ml-1" />
              <span class="ml-1"> create board </span>
            </PopoverButton>
            <PopoverOverlay class="fixed inset-0 z-10 bg-black opacity-30" />

            <transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="translate-y-1 opacity-0"
              enter-to-class="translate-y-0 opacity-100"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="translate-y-0 opacity-100"
              leave-to-class="translate-y-1 opacity-0"
            >
              <PopoverPanel
              :focus="true"
              v-slot="{close}"
                class="absolute z-10 px-4 mt-3 -translate-x-1/2 w-72 left-1/2 sm:px-0"
              >
                <div
                  class="p-3 overflow-hidden bg-white rounded-lg shadow-lg ring-1 ring-black/5"
                >
                  <form @submit.prevent="onSubmit(close)">
                    <label
                      for="name"
                      class="block mb-1 text-sm font-medium text-gray-600"
                      >Your new Board</label
                    >
                    <input
                    v-model="form.name"
                      class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
                      type="text"
                      name="name"
                      id="name"
                      placeholder="Board Name"
                    />
                    <p v-if="form.errors.name" class="text-sm text-red-600">{{form.errors.name}}</p>
                    <div class="flex justify-end mt=2">
                      <button class="px-4 py=2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Create Board</button>
                    </div>
                  </form>
                </div>
              </PopoverPanel>
            </transition>
          </Popover>
        </div>
        <ul
          class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
        >
          <li
            v-for="board in boards"
            :key="board.id"
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <InertiaLink
              class="absolute inset-0 p-3 text-lg font-bold text-white"
              :href="route('boards.show', { board: board.id })"
            >
              {{ board.name }}
            </InertiaLink>
          </li>
        </ul>
      </div>
    </div>
    <!-- <div class="h-full px-4 py-6 bg-gray-50">
      <div class="max-w-5xl mx-auto">
        <div class="flex items-center px-3 mb-4">
          <h3 class="font-black text-gray-700">My boards</h3>
          <button
            class="inline-flex items-center px-3 py-2 ml-4 font-medium bg-gray-100 rounded hover:bg-gray-200"
          >
            <PlusIcon class="w-4 h-4 -ml-1" />
            <span class="ml-1">Create board</span>
          </button>
        </div>

        <ul
          class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
        >
          <li
            v-for="board in boards"
            :key="board.id"
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <InertiaLink
              :href="route('boards.show', { board: board.id })"
              class="absolute inset-0 p-3 text-lg font-bold text-white"
            >
              {{ board.name }}
            </InertiaLink>
          </li>
        </ul>
      </div>
    </div> -->
  </BreezeAuthenticatedLayout>
</template>
