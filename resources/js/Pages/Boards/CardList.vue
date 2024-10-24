<script setup>
// import {DotsHorizontalIcon, PencilIcon, PlusIcon} from "@heroicons/vue/solid";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import CardListItemCreateForm from "@/Pages/Boards/CardListItemCreateForm.vue";
import { ref } from "vue";

const props = defineProps({
  list: Object,
});

const listRef = ref();
function onCardCreated() {
  listRef.value.scrollTop = listRef.value.scrollHeight;
}
</script>

<template>
  <div>
    <div class="flex items-center justify-between px-3 py-2">
      <h3 class="text-sm font-semibold text-gray-700">
        {{ list.name }}
      </h3>
      <Menu as="div" class="relative z-10">
        <MenuButton
          class="grid w-8 h-8 rounded-md hover:bg-gray-300 place-content-center"
        >
          <DotsHorizontalIcon class="w-5 h-5" />
        </MenuButton>

        <transition
          enter-active-class="transition duration-100 ease-out transform"
          enter-from-class="scale-90 opacity-0"
          enter-to-class="scale-100 opacity-100"
          leave-active-class="transition duration-100 ease-in transform"
          leave-from-class="scale-100 opacity-100"
          leave-to-class="scale-90 opacity-0"
        >
          <MenuItems
            class="absolute left-0 mt-2 overflow-hidden origin-top-left bg-white border rounded-md shadow-lg w-28 focus:outline-none"
          >
            <MenuItem v-slot="{ active }">
              <a
                href="#"
                :class="{ 'bg-gray-100': active }"
                class="block px-4 py-2 text-sm text-gray-700"
                >My Profile</a
              >
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <a
                href="#"
                :class="{ 'bg-gray-100': active }"
                class="block px-4 py-2 text-sm text-red-600"
                >Delete List</a
              >
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
    </div>
    <div class="flex flex-col pb-3 overflow-hidden">
      <div class="flex-1 px-3 overflow-y-auto" ref="listRef">
        <ul class="space-y-3">
          <li
            v-for="card in list.cards"
            :key="card.id"
            class="relative p-3 bg-white border-b border-gray-300 group shadow-rounded-md hover:border-gray-500"
          >
            <a href="#" class="text-sm"> {{ card.title }}</a>
            <button
              class="absolute hidden w-8 h-8 text-gray-600 bg-gray-500 rounded-md group-hover:grid top-1 right-1 place-content-center hover:text-black hover:bg-gray-200"
            >
              <PencilIcon class="w-5 h-5" />
            </button>
          </li>
        </ul>
      </div>
      <div class="px-3 mt-3">
        <CardListItemCreateForm @created="onCardCreated()" :list="list" />
      </div>
    </div>
  </div>
</template>
