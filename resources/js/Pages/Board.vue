<script setup>
// import {DotsHorizontalIcon, PencilIcon, PlusIcon} from "@heroicons/vue/solid";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import Authenticated from '@/Layouts/Authenticated.vue';

</script>

<template>
  <Authenticated>
    <div class="flex flex-col h-screen bg-red-600">
     
      <main class="flex-1 overflow-hidden">
        <div class="flex flex-col h-full">
          <div class="flex items-center justify-between p-4 shrink-0">
            <h1 class="font-bold text-white text 2xl">Board Title</h1>
            <div>
              <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white rounded-md bg white/10 hover: bg-white/20"
              >
                <DotsHorizontalIcon class="w-5 h-5" />
                <span class="ml-1"> Settings </span>
              </button>
            </div>
          </div>
          <div class="flex-1 overflow-x-auto">
            <div class="inline-flex items-start h-full px-4 pb-4 space-x-4">
              <div
                v-for="item in Array.from({ length: 4 })"
                class="flex flex-col max-h-full bg-gray-200 rounded-md w-72"
              >
                <div class="flex items-center justify-between px-3 py-2">
                  <h3 class="text-sm font-semibold text-gray-700">Backlog</h3>
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
                  <div class="flex-1 px-3 overflow-y-auto">
                    <ul class="space-y-3">
                      <li
                        v-for="item in Array.from({ length: 20 })"
                        class="relative p-3 bg-white border-b border-gray-300 group shadow-rounded-md hover:border-gray-500"
                      >
                        <a href="#" class="text-sm"> Card item</a>
                        <button
                          class="absolute hidden w-8 h-8 text-gray-600 bg-gray-500 rounded-md group-hover:grid top-1 right-1 place-content-center hover:text-black hover:bg-gray-200"
                        >
                          <PencilIcon class="w-5 h-5" />
                        </button>
                      </li>
                      <li
                        class="relative p-3 bg-white border-b border-gray-300 group shadow-rounded-md hover:border-gray-500"
                      >
                        <a href="#" class="text-sm"> Card item</a>
                        <button
                          class="absolute hidden w-8 h-8 text-gray-600 bg-gray-500 rounded-md group-hover:grid top-1 right-1 place-content-center hover:text-black hover:bg-gray-200"
                        >
                          <PencilIcon class="w-5 h-5" />
                        </button>
                      </li>
                    </ul>
                  </div>
                  <div class="px-3 mt-3">
                    <button
                      class="flex w-full p-2 text-sm font-medium text-gray-600 rounded-md item-center hover:text-black hover:bg-gray-300"
                    >
                      <PlusIcon class="w-5 h-5"> </PlusIcon>
                      <Span class="ml-1"> Add Card </Span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="w-72">
                <button
                  class="flex items-center w-full p-2 text-sm font-medium rounded-md bg-white/10 hover:bg-black/20"
                >
                  <PlusIcon class="w-5 h-5" />
                  <span> Add Another List </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </Authenticated>
</template>
